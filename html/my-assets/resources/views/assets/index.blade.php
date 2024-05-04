<x-app-layout>
    @if (session('success-message'))
        <div class="alert-message">
            <x-alert-message name="success" color="green">
                {{ session('success-message') }}
            </x-alert-message>
        </div>
    @endif
    @if (session('error-message'))
        <div class="alert-message">
            <x-alert-message name="error" color="red">
                {{ session('error-message') }}
            </x-alert-message>
        </div>
    @endif
    @php
        $firstDayOfMonth = date('Y-m-01', strtotime($formatDate));
        $lastDayOfMonth = date('Y-m-t', strtotime($formatDate));
        $monthSelectorVal = $firstDayOfMonth . ' ~ ' . $lastDayOfMonth;
    @endphp
    <div class="container mx-auto p-4 lg:p-8 xl:max-w-7xl">
        <div class="flex flex-col px-2 gap-4 text-center sm:flex-row sm:items-center sm:justify-between sm:text-start">
            <div class="grow">
                <h1 class="mb-1 text-2xl text-slate-800 dark:text-white">
                    {{ __('total_amount') }}&nbsp;{{ number_format($totalAmount) }}<span>&nbsp;円</span></h1>
                <h2 class="text-slate-800 dark:text-white">期間:&nbsp;{{$monthSelectorVal}}</h2>
            </div>
            <div class="flex items-center justify-center">
                @include('components.search-month')
            </div>
        </div>
        <hr class="h-px my-6 bg-gray-200 border-1 dark:bg-gray-700">
        @include('pages.m-table')
    </div>

    @section('scripts')
        <script type="text/javascript">
            const formatDate = "{{ $formatDate }}";
            const redirectIndex = "{{ route('assets.index') }}"
        </script>
    @endsection

    @push('script-files')
        @vite(['resources/js/debut-display-switching.js'])
    @endpush

</x-app-layout>
