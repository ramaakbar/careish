<nav class="fixed w-full bg-white border-b border-gray-200 z-1">
    <div class="flex justify-between px-4 py-3 lg:px-6">
        <div class="flex items-center">
            <button class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                  
            </button>
            <h1 class="text-2xl font-extrabold text-gray-900">Careish</h1>
        </div>

        <div class="flex items-center space-x-4">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
            </div>
            <img src="assets/placeholder_man.jpeg" class="w-8 h-8 rounded-full" alt="">
            <p>Admin</p>
        </div>
    </div>
</nav>
<div class="flex pt-16 overflow-hidden">
    <aside id="sidebar"
        class="fixed top-0 left-0 z-20  flex-col flex-shrink-0 hidden w-64 h-full pt-[3.6rem] duration-75 lg:flex transition-width">
        <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200">
            <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                <div class="flex-1 space-y-1 bg-white divide-y">
                    <ul class="pb-2 space-y-2">
                        @foreach ($sidebar as $name => $test)
                            <li class="{{ request()->is(Str::lower($name)) ? 'bg-purple-500' : '' }}">
                                <a href="{{ $test[0] }}"
                                    class="flex items-center px-5 py-2 {{ request()->is(Str::lower($name)) ? 'text-white' : 'text-gray-900 ' }}">
                                    {{ svg($test[1], 'w-6 h-6') }}
                                    <span class="ml-3">{{ $name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <div class="fixed inset-0 z-10 hidden bg-gray-900 opacity-50" id="sidebarBackdrop"></div>
    <div id="main-content" class="w-full h-full overflow-y-auto bg-gray-50 lg:ml-64">
        {{ $slot }}
        <footer class="my-10 text-sm text-center text-gray-500">
            © 2022 Careish. All rights reserved.</footer>
    </div>
</div>
