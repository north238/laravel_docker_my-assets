<a data-tooltip-target="tooltip-notification" data-tooltip-placement="bottom" href="{{ route('notification.index') }}"
    class="relative inline-flex items-center text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg p-2.5 mt-1 mx-2">
    <i class="fa-solid fa-bell"></i>
    <span class="sr-only">Notifications</span>
    @if (!empty($unreadNotificationCount))
        <div
            class="absolute inline-flex items-center justify-center w-2 h-2 bg-blue-500 rounded-full top-[3px] end-[1px]">
        </div>
    @endif
</a>
<div id="tooltip-notification" role="tooltip"
    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-dark_table">
    {{ __('notification_info') }}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
