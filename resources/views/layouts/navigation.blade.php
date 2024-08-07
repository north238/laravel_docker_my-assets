<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-dark_bg dark:border-dark_border">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto pr-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center overflow-hidden">
                    <a href="{{ route('assets.dashboard') }}" class="max-w-[170px] sm:max-w-[200px]">
                        <img src="{{ asset('/images/bridgin_v2/bridgin_v2_fill_none.svg') }}" class="dark:invert dark:brightness-0 dark:saturate-0 transition-all duration-200">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex dark:text-white">
                    <x-nav-link :href="route('assets.dashboard')" :active="request()->routeIs('assets.dashboard')">
                        {{ __('dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex dark:text-white">
                    <x-nav-link :href="route('asset-trend.index')" :active="request()->routeIs('asset-trend.index')">
                        {{ __('chart') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex dark:text-white">
                    <x-nav-link :href="route('assets.create')" :active="request()->routeIs('assets.create')">
                        {{ __('create_asset') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex dark:text-white">
                    <x-nav-link :href="route('assets.showDeletedAssets')" :active="request()->routeIs('assets.showDeletedAssets')">
                        {{ __('restore') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                {{-- お知らせ通知機能 --}}
                <x-notification-icon />
                {{-- ダークモード切替アイコン --}}
                <x-dark-with-light />
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center me-1 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-white dark:bg-dark_bg hover:text-gray-700 dark:hover:text-dark_sub_text focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fa-regular fa-user pr-2"></i>{{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fa-solid fa-arrow-right-from-bracket pr-2"></i>{{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div id="mobile-hamburger" class="flex items-center sm:hidden">
                {{-- お知らせ通知機能 --}}
                <x-notification-icon />
                <div class="switch-dark-with-light-sp flex items-center">
                    <button id="theme-toggle-sp" type="button"
                        class="text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-3 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg p-2 m-2 text-sm">
                        <svg id="theme-toggle-dark-icon-sp" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon-sp" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="-me-2 flex items-center">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-dark_table focus:outline-none focus:bg-gray-100 dark:focus:bg-dark_table focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden dark:bg-dark_table border-y border-slate-200 dark:border-dark_border">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('assets.dashboard')" :active="request()->routeIs('assets.dashboard')">
                <i class="fa-solid fa-hand-holding-dollar pr-2"></i>{{ __('dashboard') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('asset-trend.index')" :active="request()->routeIs('asset-trend.index')">
                <i class="fa-solid fa-chart-bar pr-2"></i>{{ __('chart') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('assets.create')" :active="request()->routeIs('assets.create')">
                <i class="fa-regular fa-square-plus pr-2"></i>{{ __('create_asset') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('assets.showDeletedAssets')" :active="request()->routeIs('assets.showDeletedAssets')">
                <i class="fa-solid fa-trash-arrow-up pr-2"></i>{{ __('restore') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-200 dark:border-dark_border">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500 dark:text-white">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="dark:text-white">
                    <i class="fa-regular fa-user pr-2"></i>{{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" class="dark:text-white"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket pr-2"></i>{{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
