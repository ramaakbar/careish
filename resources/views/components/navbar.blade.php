<nav class="sticky top-0 z-10 w-full py-2 mb-10 bg-white border-b max-h-fit">
    <div class="px-5 mx-auto max-w-7xl">
        <div class="flex items-center justify-between text-gray-700">
            <div class="">
                <a href="/"
                    class="font-bold text-[24px] hover:text-gray-900 transition ease-in-out duration-300">CareIsh.</a>
            </div>
            <div class="hidden space-x-5 sm:flex sm:items-center">
                <a href="/#feature"
                    class="p-2 text-gray-600 transition duration-300 ease-in-out rounded hover:bg-gray-100 hover:text-gray-800">Feature</a>
                <a href="/#aboutUs"
                    class="p-2 text-gray-600 transition duration-300 ease-in-out rounded hover:bg-gray-100 hover:text-gray-800">About</a>
                <a href="/nurses"
                    class="p-2 text-gray-600 transition duration-300 ease-in-out rounded hover:bg-gray-100 hover:text-gray-800">Nurses</a>
                <a href="/articles"
                    class="p-2 text-gray-600 transition duration-300 ease-in-out rounded hover:bg-gray-100 hover:text-gray-800">Articles</a>
                @guest
                    <a href="/login"
                        class="text-gray-600 transition duration-300 ease-in-out hover:text-gray-800">Login</a>
                    <a href="/register" class=""><button
                            class="rounded-[6px] bg-gray-800 pt-[9px] pb-[9px] pr-[18px] pl-[18px] hover:bg-gray-900 transition ease-in-out duration-300 text-white hover:text-gray-200">Register</button></a>
                @endguest
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <div
                                class="inline-flex items-center p-2 text-sm font-medium text-gray-600 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 md:mr-0">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 mr-2 rounded-full"
                                    src="{{ asset('/storage/' . Auth::user()->picture) }}" alt="user photo">
                                {{ Auth::user()->name }}
                                <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </x-slot>
                        <x-dropdown.item onclick="location.href='/user/transaction-list';" icon="shopping-bag"
                            label="Transaction Lists" />
                        <x-dropdown.item onclick="location.href='/user/profile-setting';" icon="user"
                            label="Profile Setting" />
                        <x-dropdown.item onclick="location.href='/user/favorites';" icon="bookmark" label="Favorites" />
                        <x-dropdown.item onclick="location.href='/user/reviews';" icon="star" label="Reviews" />
                        @if (Auth::user()->role_id == 2)
                            <x-dropdown.item onclick="location.href='/dashboard';" separator label="Dashboard" />
                        @endif
                        <form action="/logout" method="POST" class="">
                            @csrf
                            <x-dropdown.item>
                                <button type="submit" class="w-full text-left">Sign
                                    Out</button>
                            </x-dropdown.item>
                        </form>
                    </x-dropdown>
                @endauth

            </div>
            <button class="navbar sm:hidden hover:bg-gray-200 hover:text-gray-900 p-1.5 rounded-lg"
                data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                data-drawer-placement="right" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </div>
</nav>
<x-sidebar-content />
