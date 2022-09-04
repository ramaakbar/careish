<nav class="fixed z-30 w-full bg-white border-b border-gray-200">
    <div class="flex justify-between px-2 py-3 lg:px-6">
        <div class="flex items-center">
            <button x-data @click="$store.sidebar.toggle()"
                class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6" x-data
                    :class="{ 'hidden': $store.sidebar.open, '': !($store.sidebar.open) }">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="hidden w-6 h-6" x-data
                    :class="{ '': $store.sidebar.open, 'hidden': !($store.sidebar.open) }">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </button>
            <a href="/" class="text-2xl font-extrabold text-gray-900">Careish</a>
        </div>

        <div class="flex items-center space-x-4">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
            </div>
            <button data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm font-medium text-gray-900 rounded-full md:mr-0 "
                type="button">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 mr-2 rounded-full" src="/assets/placeholder_man.jpeg" alt="user photo">
                Admin
                <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownAvatarName"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44">
                <ul class="py-1 text-sm text-gray-700 "
                    aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                    <li>
                        <a href="/"
                            class="block px-4 py-2 hover:bg-gray-100">Home Page</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100">Sign Out</a>
                    </li>
            </div>

        </div>
    </div>
</nav>
<div class="flex pt-16 overflow-hidden">
    <aside id="sidebar"
        class="fixed top-0 left-0 z-20  flex-col flex-shrink-0  flex w-64 h-full pt-[3.6rem] duration-75 lg:flex transition-width"
        x-data :class="{ '': $store.sidebar.open, 'hidden': !($store.sidebar.open) }">
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
    <div class="fixed inset-0 z-10 bg-gray-900 opacity-50 lg:hidden" id="sidebarBackdrop" x-data
        :class="{ '': $store.sidebar.open, 'hidden': !($store.sidebar.open) }" @click="$store.sidebar.toggle()"></div>
    <div id="main-content" class="w-full h-full overflow-y-auto bg-gray-50 lg:ml-64">
        {{ $slot }}
        <footer class="mt-10 mb-5 text-sm text-center text-gray-500">
            © 2022 Careish. All rights reserved.</footer>
    </div>
</div>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('sidebar', {
            open: false,
            toggle() {
                console.log(this.open);
                this.open = !this.open;
            }
        })
    })
</script>
