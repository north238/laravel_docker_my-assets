@php
    $isChartDataEmpty = $assetsMonthlyData['assetsMonthlyData']->isEmpty();
@endphp
<div
    class="flex flex-col justify-between w-full min-h-[540px] bg-white rounded-lg border border-slate-200 dark:border-dark_border dark:bg-dark_table hover:border-slate-300 p-4 md:p-6">
    <div class="flex justify-between pb-3 border-b border-slate-200 dark:border-dark_border">
        <div class="flex justify-center items-center">
            <div>
                <div class="flex flex-row mb-1">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">
                        {{ __('monthly_chart') }}</h5>
                    <svg data-popover-target="monthly-chart-info" data-popover-placement="bottom"
                        class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-dark_sub_text cursor-pointer ms-1"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                    </svg>
                </div>
                <div>
                    <p class="inline-flex items-center text-sm sm:text-base font-medium text-slate-800 dark:text-dark_sub_text">
                        <span class="w-1.5 h-1.5 bg-blue-600 rounded-full me-1.5"></span>
                        {{ __('total_amount') }}:&nbsp;{{ number_format($assetsMonthlyData['totalAmount']) }}&nbsp;円
                    </p>
                </div>
                <div>
                    @php
                        $monthArray = $assetsMonthlyData['betweenMonthArray'];
                        $firstDayOfMonth = date('Y/m/01', strtotime($monthArray[0]));
                        $lastDayOfMonth = date('Y/m/t', strtotime($monthArray[1]));
                        $monthSelectorVal = $firstDayOfMonth . ' ~ ' . $lastDayOfMonth;
                    @endphp
                    <p class="mt-1 inline-flex items-center text-sm sm:text-base font-medium text-slate-800 dark:text-dark_sub_text"><span
                            class="w-1.5 h-1.5 bg-blue-600 rounded-full me-1.5"></span>
                        {{ __('period') }}&nbsp;{{ $monthSelectorVal }}
                    </p>
                </div>
            </div>
            <div data-popover id="monthly-chart-info" role="tooltip"
                class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                <div class="p-3 space-y-2">
                    <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('monthly_chart_detail') }}</h3>
                    <p>{{ __('monthly_chart_detail_message') }}</p>
                    <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('display_period') }}</h3>
                    <p>{{ __('display_period_message') }}</p>
                </div>
                <div data-popper-arrow></div>
            </div>
        </div>
    </div>
    @if ($isChartDataEmpty)
        <div class="pb-3 flex flex-col justify-center items-center">
            <div class="text-sm sm:text-base font-medium">
                {{ __('search_error_message') }}
            </div>
            <a href="{{ route('assets.create') }}" class="mt-2 text-sm sm:text-base font-medium">
                {{ __('asset_create_page') }}<span
                    class="text-blue-600 dark:text-blue-500 hover:underline">{{ __('link_tag') }}</span><i
                    class="fa-solid fa-angle-right text-blue-600 dark:text-blue-500 ml-2"></i>
            </a>
        </div>
    @else
        <div class="w-full h-[300px]">
            <div class="relative w-full h-[93%] sm:h-full">
                <canvas id="monthly-chart"></canvas>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
        <div class="flex justify-between items-center pt-5">
            @php
                $monthArray = $assetsMonthlyData['betweenMonthArray'];
                $displayMonth = date('Y-m', strtotime($monthArray[0]));
            @endphp
            <form action="{{ route('asset-trend.search') }}" method="post" class="flex items-center">
                @csrf
                <div class="calender-input-icon">
                    <input type="month" name="search-month-date" id="search-month-date" value="{{ $displayMonth }}"
                        class="text-sm sm:text-base border-0 border-b-2 border-gray-300 bg-transparent focus:border-blue-400 focus:outline-none appearance-non focus:ring-0 text-slate-600 block w-28 sm:w-32 dark:border-white dark:text-white dark:focus:border-blue-500"
                        required>
                </div>
                <button type="submit"
                    class="text-gray-500 dark:text-white hover:transform hover:duration-200 hover:-translate-y-1"><i
                        class="fa-solid fa-magnifying-glass"></i><span class="sr-only">Search</span></button>
                <input type="hidden" id="first-day-of-month" name="first-day-of-month" value="{{ $displayMonth }}">
            </form>
            <button type="button" data-modal-target="monthly-modal" data-modal-toggle="monthly-modal"
                class="text-sm sm:text-base inline-flex items-center rounded-lg text-blue-600 dark:text-blue-500 px-3 py-2">
                <span class="hover:underline">{{ __('display_data') }}</span>
                <i class="fa-solid fa-angle-right ml-2"></i>
            </button>
        </div>
    </div>
</div>

<x-chart-data-modal type="monthly" name="月間チャート詳細">
    <x-chart-data-table :data="$assetsMonthlyData['genreData']" />
</x-chart-data-modal>

@pushIf(!$isChartDataEmpty, 'script-files')
@vite(['resources/js/monthly-chart.js'])
@endPushIf
