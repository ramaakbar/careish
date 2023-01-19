<nav class="fixed z-10 w-full bg-white border-b border-gray-200">
    <div class="flex justify-between px-2 py-1 lg:px-6">
        <div class="flex items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="hidden w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </button>
            <a href="/" class="text-2xl font-extrabold text-gray-900">Careish</a>
        </div>

        <div class="flex items-center space-x-2">
            <div class="flex items-center">
                <a href="/chats"
                    class="p-2 text-gray-600 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                    </svg>
                </a>
            </div>
            <x-dropdown>
                <x-slot name="trigger">
                    <div
                        class="inline-flex items-center p-2 text-sm font-medium text-gray-600 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 md:mr-0">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 mr-2 rounded-full" src="{{ asset('/storage/' . Auth::user()->picture) }}"
                            alt="user photo">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </x-slot>
                <x-dropdown.item onclick="location.href='/';" label="Home Page" />
                <x-dropdown.item>
                    <form action="/logout" method="POST" class="">
                        @csrf
                        <button type="submit" class="">Sign
                            Out</button>
                    </form>
                </x-dropdown.item>
            </x-dropdown>

        </div>
    </div>
</nav>
<div class="flex pt-16 overflow-hidden">
    <aside id="sidebar" class="fixed top-0 left-0 z-20 flex-col flex-shrink-0 hidden w-64 h-full lg:flex">
        <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200">
            <div class="flex flex-col flex-1 pb-4 overflow-y-auto">
                <a href="/" class="px-2 py-3 mb-5 text-2xl font-extrabold text-gray-900 lg:px-6">Careish</a>
                <div class="flex-1 px-2 space-y-1 divide-y ">
                    <ul class="pb-2 space-y-2">
                        @foreach ($sidebar as $name => $test)
                            @if (request()->is('dashboard'))
                                <li
                                    class="{{ request()->is(Str::lower($name)) ? 'bg-blue-100 rounded hover:bg-gray-100' : 'rounded hover:bg-gray-100' }}">
                                @else
                                <li
                                    class="{{ request()->is('dashboard/' . Str::lower($name) . '*') ? 'bg-blue-100 rounded hover:bg-gray-100' : 'rounded hover:bg-gray-100' }}">
                            @endif
                            @if (request()->is('dashboard'))
                                <a href="{{ $test[0] }}"
                                    class="flex items-center px-2 py-2 font-medium {{ request()->is(Str::lower($name) . '*') ? 'text-blue-700 ' : 'text-gray-600 ' }}">
                                    {{ svg($test[1], 'w-6 h-6') }}
                                    <span class="ml-3">{{ $name }}</span>
                                </a>
                            @else
                                <a href="{{ $test[0] }}"
                                    class="flex items-center px-2 py-2 font-medium {{ request()->is('dashboard/' . Str::lower($name) . '*') ? 'text-blue-700' : 'text-gray-600' }}">
                                    {{ svg($test[1], 'w-6 h-6') }}
                                    <span class="ml-3">{{ $name }}</span>
                                </a>
                            @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <div id="main-content" class="w-full h-full overflow-y-auto bg-gray-50 lg:ml-64">
        {{ $slot }}

    </div>
</div>

<!-- drawer component -->
<div id="drawer-navigation"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80"
    tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
    <h5 id="drawer-label" class="inline-flex items-center text-base font-semibold text-gray-500">Menu</h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2">
            @foreach ($sidebar as $name => $test)
                <li>
                    <a href="{{ $test[0] }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                        {{ svg($test[1], 'w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900') }}
                        <span class="ml-3">{{ $name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
