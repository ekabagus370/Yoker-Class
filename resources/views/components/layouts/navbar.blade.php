<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.svg') }}" class="h-11" alt="E-Gov Logo" />
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @guest
                <a href="{{ route('filament.admin.auth.login') }}">
                    <button
                        type="button"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                </a>
            @endguest
            @auth
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->getFilamentAvatarUrl() }}" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                        <span
                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->role }}</span>
                    </div>
                    <ul class="" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('filament.admin.auth.profile') }}"
                                class="flex flex-row items-center py-3 px-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <x-heroicon-m-user-circle class="w-6 mr-3 text-gray-400" />
                                Profile
                            </a>
                        </li>
                        <li>
                            <div class="flex flex-row p-1 border-y items-center">
                                <button type="button" class="px-3 py-2 hover:bg-gray-100 rounded" id="light-mode">
                                    <x-heroicon-m-sun class="w-6 text-gray-400" />
                                </button>
                                <button type="button" class="px-3 py-2 hover:bg-gray-100 rounded" id="dark-mode">
                                    <x-heroicon-m-moon class="w-6 text-gray-400" />
                                </button>
                                <button type="button" class="px-3 py-2 hover:bg-gray-100 rounded" id="system-mode">
                                    <x-heroicon-m-computer-desktop class="w-6 text-gray-400" />
                                </button>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('filament.admin.pages.dashboard') }}"
                                class="flex flex-row items-center py-3 px-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <x-heroicon-o-home class="w-6 mr-3 text-gray-400" />
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('filament.admin.auth.logout') }}"
                                class="flex flex-row items-center py-3 px-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <x-heroicon-o-arrow-left-on-rectangle class="w-6 mr-3 text-gray-400" />
                                Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            @endauth
            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#Beranda"
                        class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#fitur"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Fitur</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
