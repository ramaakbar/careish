<div class="w-full pb-10 max-h-fit">
    <div class="px-5 mx-auto max-w-7xl">
        <div class="flex justify-between pt-[20px] items-center text-gray-700">
            <div class="">
                <a href="/"
                    class="font-bold text-[24px] hover:text-gray-900 transition ease-in-out duration-300">CareIsh.</a>
            </div>
            <div class="hidden space-x-5 sm:block">
                <a href="/#feature" class="text-gray-600 transition duration-300 ease-in-out hover:text-gray-800">Feature</a>
                <a href="/#aboutUs" class="text-gray-600 transition duration-300 ease-in-out hover:text-gray-800">About</a>
                <a href="/login" class="text-gray-600 transition duration-300 ease-in-out hover:text-gray-800">Login</a>
                <a href="/register" class=""><button
                        class="rounded-[6px] bg-gray-800 pt-[9px] pb-[9px] pr-[18px] pl-[18px] hover:bg-gray-900 transition ease-in-out duration-300 text-white hover:text-gray-200">Register</button></a>
            </div>
            <button class="navbar sm:hidden" data-drawer-target="drawer-navigation"
                data-drawer-show="drawer-navigation" data-drawer-placement="right" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </div>
</div>
{{-- untuk menu di atas kanan pas tampilan mobile --}}
<div id="drawer-navigation" class="fixed z-40 hidden h-screen p-4 overflow-y-auto bg-white w-80" tabindex="-1"
aria-labelledby="drawer-navigation-label">
<h5 id="drawer-navigation-label" class="pl-2 text-base font-semibold text-gray-500 uppercase">Menu
</h5>
<button type="button" data-drawer-dismiss="drawer-navigation" aria-controls="drawer-navigation"
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
        <li>
            <a href="#feature"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100"
                data-drawer-dismiss="drawer-navigation">
                {{-- <svg aria-hidden="true"
                    class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-90"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd"></path>
                </svg> --}}
                <span class="flex-1 whitespace-nowrap">Feature</span>
            </a>
        </li>
        <li>
            <a href="#aboutUs"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100"
                data-drawer-dismiss="drawer-navigation">
                {{-- <svg aria-hidden="true"
                    class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                        clip-rule="evenodd"></path>
                </svg> --}}
                <span class="flex-1 whitespace-nowrap">About</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex items-center p-2 text-base font-normal text-gray-900 hover:bg-gray-100 rounded-lg >
                {{-- <svg aria-hidden="true"
                    class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                        clip-rule="evenodd"></path>
                </svg> --}}
                <span class="flex-1 whitespace-nowrap">Login</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                {{-- <svg aria-hidden="true"
                    class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                        clip-rule="evenodd"></path>
                </svg> --}}
                <span class="flex-1 whitespace-nowrap">Register</span>
            </a>
        </li>
        <li>
            <button type="button"
                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                <img class="w-8 h-8 mr-2 rounded-full" src="/assets/placeholder_man.jpeg" alt="user photo">
                <span class="flex-1 ml-3 text-left whitespace-nowrap">Jamal</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Profile</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Dashboard</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
</div>