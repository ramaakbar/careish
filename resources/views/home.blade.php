<x-layout>
    <div class="bg-[#504BE5] w-full max-h-fit pb-10">
        <div class="px-5 mx-auto max-w-7xl">
            <div class="flex justify-between pt-[20px] items-center text-white">
                <div class="">
                    <a href="/"
                        class="font-bold text-[24px] hover:text-gray-200 transition ease-in-out duration-300">CareIsh.</a>
                </div>
                <div class="hidden space-x-5 sm:block">
                    <a href="#feature" class="transition duration-300 ease-in-out hover:text-gray-200">Feature</a>
                    <a href="#aboutUs" class="transition duration-300 ease-in-out hover:text-gray-200">About</a>
                    <a href="/login" class="transition duration-300 ease-in-out hover:text-gray-200">Login</a>
                    <a href="/register" class="hover:text-gray-200"><button
                            class="rounded-[6px] bg-gray-800 pt-[9px] pb-[9px] pr-[18px] pl-[18px] hover:bg-gray-900 transition ease-in-out duration-300">Register</button></a>
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
            <div
                class="flex flex-col items-center justify-center mt-10 text-center text-white lg:text-left lg:justify-between lg:flex-row space-y-7">
                <div class="">
                    <div class="text-[45px] w-auto font-bold leading-[65px]">
                        <h1 class="tracking-[-0.01em]">Your Trusted<br>Home Care<br>Service Companion</h1>
                    </div>
                    <div class="w-auto mt-[30px] text-[20px]">
                        <h2>Looking for a high quality nurses?</h2>
                        <h2>all you need is just one click away.</h2>
                    </div>
                    <div class="mt-[45px]">
                        <a href="/" class="text-[16px] font-medium hover:text-gray-300"><button
                                class="rounded-[10px] bg-gray-800 pt-[17px] pb-[17px] pr-[24px] pl-[24px] hover:bg-gray-900 transition ease-in-out duration-500">Browse
                                our
                                agents</button></a>
                    </div>
                </div>
                <div class="">
                    <img class="rounded-xl drop-shadow-xl" src="{{ asset('assets/homePage_care.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="px-5 mx-auto mt-16 scroll-m-16 max-w-7xl" id="feature">
        <div class="">
            <div class="text-center ">
                <p class="text-[#504BE5] text-[25px] font-medium tracking-[.15em]">FEATURES</p>
                <p class="mt-[34px] font-bold text-[36px]">These are the things that differ us from others</p>
            </div>
        </div>
        <div class="flex flex-col items-center justify-between mt-10 space-y-5 lg:flex-row lg:space-y-0">
            <div class="border h-[470px] sm:w-[380px] shadow-md w-full">
                <div class="flex flex-col items-center justify-center p-10 space-y-5">
                    <img class="opacity-50" src="{{ asset('assets/easy_to_use.png') }}" alt="">
                    <p class="text-xl font-bold sm:text-2xl">Easy To Use</p>
                    <p class="font-light text-center text-md sm:text-lg">By using our service, ordering a home care service would
                        be much
                        <span class="text-[#504BE5] font-bold">easier</span> than
                        before.
                    </p>
                </div>
            </div>
            <div class="border w-full h-[470px] sm:w-[380px] shadow-md">
                <div class="flex flex-col items-center justify-center p-10 space-y-5">
                    <img class="opacity-50" src="{{ asset('assets/web_mobile_support.png') }}" alt="">
                    <p class="text-xl font-bold text-center sm:text-2xl">Web and Mobile Support</p>
                    <p class="font-light text-center text-md sm:text-lg">You can use our service <span
                            class="text-[#504BE5] font-bold">anywhere</span> with any devices you
                        have.</p>
                </div>
            </div>
            <div class="border w-full h-[470px] sm:w-[380px] shadow-lg rounded-sm">
                <div class="flex flex-col items-center justify-center p-10 space-y-5">
                    <img class="opacity-50" src="{{ asset('assets/nurses.png') }}" alt="">
                    <p class="text-xl font-bold sm:text-2xl">High Quality Nurses</p>
                    <p class="font-light text-center text-md sm:text-lg">
                        We only provide the <span class="text-[#504BE5] font-bold">best nurses</span> that we have to
                        take care of
                        your beloved ones.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="px-5 mx-auto mt-24 scroll-m-24 max-w-7xl" id="aboutUs">
        <div
            class="flex flex-col items-center justify-between space-x-0 space-y-10 lg:flex-row lg:space-x-20 lg:space-y-0">
            <div class="w-full lg:w-4/6">
                <div class="">
                    <h2 class="font-medium text-base text-[#504BE5]">Get to know CareIsh</h2>
                </div>
                <div class="mt-3">
                    <h1 class="text-5xl font-bold">About Us</h1>
                </div>
                <div class="mt-10 text-lg font-light">
                    <p class="leading-7">
                        CareIsh is founded in 2022 by Akbar Ramadhan Yusri and Patrick Thelysander as a concern of home
                        care service in Indonesia.
                        As technology grows rapidly each year, so does most of business model going for a modern
                        approach too.
                        Previously, ordering a home care service does take a bit of effort starting from the ordering
                        process using WhatsApp or phone,
                        then searching for suitable nurses for the customer through the customer service, followed by
                        assigning the nurses to the customer.
                    </p>
                    <br>
                    <p class="leading-7">
                        These steps are the ones that we are trying to skip by simplifying them using an application,
                        called <span class="font-bold">CareIsh</span>.
                    </p>
                </div>
            </div>
            <div class="w-auto lg:w-3/6">
                <img class="rounded-xl" src="{{ asset('assets/about_elder.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="px-5 mx-auto mt-24 max-w-7xl">
        <div class="relative box-border flex flex-col items-center justify-center bg-[#504BE5] rounded-xl">
            <img class="absolute bottom-0 left-0 w-20 sm:w-24 md:w-max" src="{{ asset('assets/boxLeftBottomPattern.svg') }}" alt="">
            <img class="absolute top-0 right-0 w-20 sm:w-24 md:w-max" src="{{ asset('assets/boxRightTopPattern.svg') }}" alt="">
            <div class="pt-20 pb-10">
                <p class="text-xl font-semibold text-white sm:text-2xl md:text-4xl ">What are you waiting for?<p>
            </div>
            <div class="pb-16">
                <a href="/register" class="text-sm font-medium text-white hover:text-gray-300"><button
                    class="rounded-[10px] bg-gray-800 pt-[17px] pb-[17px] pr-[60px] pl-[60px] hover:bg-gray-900 transition ease-in-out duration-500">Register Now</button></a>
            </div>
        </div>
    </div>
    <div class="px-5 mx-auto mt-24 max-w-7xl">
        <div class="flex flex-wrap gap-4 text-xs font-medium sm:space-x-10 sm:text-sm">
            <a class="transition duration-300 ease-in-out hover:text-gray-700" href="">Instagram</a>
            <a class="transition duration-300 ease-in-out hover:text-gray-700" href="">Twitter</a>
            <a class="transition duration-300 ease-in-out hover:text-gray-700" href="">Youtube</a>
            <a class="transition duration-300 ease-in-out hover:text-gray-700" href="">Email</a>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-4 pt-8">
            <div class="text-xs sm:text-sm font-medium text-[#848484]">
                <p class="">Jl. Perikani Raya No. 1B Rawamangun - Jakarta Timur</p>
                <p class="pt-2">Telp: 021(489-4415)</p>
                <p class="pt-2">Fax: 021(4786-9417)</p>
            </div>
            <div class="font-bold text-black">
                <h1 class="text-3xl sm:text-5xl">CareIsh</h1>
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-4 py-5 mt-5 text-xs border-t border-gray-200 sm:text-sm md:text-base">
            <div class="flex font-medium space-x-11">
                <a class="transition duration-300 ease-in-out hover:text-gray-700" href="#feature">Feature</a>
                <a class="transition duration-300 ease-in-out hover:text-gray-700" href="#aboutUs">About</a>
                <a class="transition duration-300 ease-in-out hover:text-gray-700" href="/login">Login</a>
            </div>
            <div class="">
                <p>Made by <b>CareIsh Team</b> | All rights reserved. ©</p>
            </div>
        </div>
    </div>

    {{-- untuk menu di atas kanan pas tampilan mobile --}}
    <div id="drawer-navigation" class="fixed z-40 h-screen p-4 overflow-y-auto bg-white w-80 dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 id="drawer-navigation-label"
            class="pl-2 text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu
        </h5>
        <button type="button" data-drawer-dismiss="drawer-navigation" aria-controls="drawer-navigation"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
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
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                        data-drawer-dismiss="drawer-navigation">
                        {{-- <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd"></path>
                        </svg> --}}
                        <span class="flex-1 whitespace-nowrap">Feature</span>
                    </a>
                </li>
                <li>
                    <a href="#aboutUs"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                        data-drawer-dismiss="drawer-navigation">
                        {{-- <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
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
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        {{-- <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
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
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        {{-- <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
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
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
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
                                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Profile</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</x-layout>
