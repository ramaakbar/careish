<x-layout>
    <div class="bg-[#504BE5] w-full max-h-fit pb-10">
        <div class="px-5 mx-auto max-w-7xl">
            <div class="flex justify-between pt-[20px] items-center text-white">
                <div class="">
                    <a href="/"
                        class="font-bold text-[24px] hover:text-gray-200 transition ease-in-out duration-300">CareIsh.</a>
                </div>
                <div class="hidden space-x-5 sm:flex sm:items-center">
                    <a href="#feature" class="transition duration-300 ease-in-out hover:text-gray-200">Feature</a>
                    <a href="#aboutUs" class="transition duration-300 ease-in-out hover:text-gray-200">About</a>
                    <a href="/nurses" class="transition duration-300 ease-in-out hover:text-gray-200">Nurses</a>
                    <a href="/articles" class="transition duration-300 ease-in-out hover:text-gray-200">Articles</a>
                    @guest
                        <a href="/login" class="transition duration-300 ease-in-out hover:text-gray-200">Login</a>
                        <a href="/register" class="hover:text-gray-200"><button
                                class="rounded-[6px] bg-gray-800 pt-[9px] pb-[9px] pr-[18px] pl-[18px] hover:bg-gray-900 transition ease-in-out duration-300">Register</button></a>
                    @endguest
                    @auth
                        <x-dropdown>
                            <x-slot name="trigger">
                                <div
                                    class="inline-flex items-center p-2 text-sm font-medium rounded cursor-pointer md:mr-0 transition duration-300 ease-in-out hover:text-gray-200">
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
                        <a href="/nurses" class="text-[16px] font-medium hover:text-gray-300"><button
                                class="rounded-[10px] bg-gray-800 pt-[17px] pb-[17px] pr-[24px] pl-[24px] hover:bg-gray-900 transition ease-in-out duration-500">Browse
                                our
                                agents</button></a>
                    </div>
                </div>
                <div class="">
                    <img class="rounded-xl drop-shadow-xl" src="https://d2ac3u20cbkyt7.cloudfront.net/homePage_care.png"
                        alt="">
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
                    <img class="opacity-50" src="https://d2ac3u20cbkyt7.cloudfront.net/easy_to_use.png" alt="">
                    <p class="text-xl font-bold sm:text-2xl">Easy To Use</p>
                    <p class="font-light text-center text-md sm:text-lg">By using our service, ordering a home care
                        service would
                        be much
                        <span class="text-[#504BE5] font-bold">easier</span> than
                        before.
                    </p>
                </div>
            </div>
            <div class="border w-full h-[470px] sm:w-[380px] shadow-md">
                <div class="flex flex-col items-center justify-center p-10 space-y-5">
                    <img class="opacity-50" src="https://d2ac3u20cbkyt7.cloudfront.net/web_mobile_support.png"
                        alt="">
                    <p class="text-xl font-bold text-center sm:text-2xl">Web and Mobile Support</p>
                    <p class="font-light text-center text-md sm:text-lg">You can use our service <span
                            class="text-[#504BE5] font-bold">anywhere</span> with any devices you
                        have.</p>
                </div>
            </div>
            <div class="border w-full h-[470px] sm:w-[380px] shadow-lg rounded-sm">
                <div class="flex flex-col items-center justify-center p-10 space-y-5">
                    <img class="opacity-50" src="https://d2ac3u20cbkyt7.cloudfront.net/nurses.png" alt="">
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
                <img class="rounded-xl" src="https://d2ac3u20cbkyt7.cloudfront.net/about_elder.png" alt="">
            </div>
        </div>
    </div>
    <div class="px-5 mx-auto mt-24 max-w-7xl">
        <div class="relative box-border flex flex-col items-center justify-center bg-[#504BE5] rounded-xl">
            <img class="absolute bottom-0 left-0 w-20 sm:w-24 md:w-max"
                src="{{ asset('assets/boxLeftBottomPattern.svg') }}" alt="">
            <img class="absolute top-0 right-0 w-20 sm:w-24 md:w-max"
                src="{{ asset('assets/boxRightTopPattern.svg') }}" alt="">
            <div class="pt-20 pb-10">
                <p class="text-xl font-semibold text-white sm:text-2xl md:text-4xl ">What are you waiting for?
                <p>
            </div>
            <div class="pb-16">
                <a href="/register" class="text-sm font-medium text-white hover:text-gray-300"><button
                        class="rounded-[10px] bg-gray-800 pt-[17px] pb-[17px] pr-[60px] pl-[60px] hover:bg-gray-900 transition ease-in-out duration-500">Register
                        Now</button></a>
            </div>
        </div>
    </div>


    <x-footer />
    <x-chat-button-floating />

    <x-sidebar-content />
</x-layout>
