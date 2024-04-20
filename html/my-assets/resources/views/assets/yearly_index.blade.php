<x-app-layout>
    <div id="" class="block m-6 p-6 bg-slate-50 border border-gray-200 rounded-lg shadow">
        <x-slot name="header">
            <h2 class="font-semibold text-gray-800 leading-tight">
                {{ __('all_assets') }}
            </h2>
        </x-slot>
        <div class="alert-message">
            @if (session('success-message'))
                <x-alert-message name="success" color="green">
                    {{ session('success-message') }}
                </x-alert-message>
            @endif
        </div>
        <div class="flex justify-between items-center gap-4 mx-12 my-5">
            <div class="flex flex-row items-center gap-3 p-3 bg-white dark:bg-gray-800 border border-gray-200 rounded-lg">
                <h2 class="text-2xl font-medium title-font text-gray-900 dark:text-white">
                    {{ __('total_amount') }}</h2>
                <p class="text-base dark:text-white">
                <p class="text-xl">{{ number_format($totalAmounts[0]) }}<span>円</span></p>
                </p>
            </div>
            <div class="p-3 bg-white dark:bg-gray-800 border border-gray-200 rounded-lg align-middle">
                <label class="relative top-1 left-2 inline-flex items-center me-5 cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div
                        class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">表示切替</span>
                </label>
            </div>
        </div>
        <div>
            @include('components.m_yearly_table')
        </div>
    </div>
</x-app-layout>