<x-layout>
    <div class="flex flex-col w-full min-h-screen">
        <div class="sticky top-0 w-full py-5 mb-10 bg-white border-b max-h-fit">
            <div class="px-5 mx-auto max-w-7xl">
                <div class="flex items-center justify-between text-gray-900">
                    <div class="">
                        <a href="/"
                            class="font-bold text-[24px] hover:text-gray-200 transition ease-in-out duration-300">CareIsh.</a>
                    </div>
                    <div class="hidden space-x-5 sm:block">
                        <a href="#feature" class="transition duration-300 ease-in-out hover:text-gray-200">Feature</a>
                        <a href="#aboutUs" class="transition duration-300 ease-in-out hover:text-gray-200">About</a>
                        <a href="/login" class="transition duration-300 ease-in-out hover:text-gray-200">Login</a>
                        <a href="/register" class="hover:text-gray-200"><button
                                class="rounded-[6px] bg-gray-800 pt-[9px] pb-[9px] pr-[18px] pl-[18px] hover:bg-gray-900 transition ease-in-out duration-300 text-white">Register</button></a>
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

        <main class="flex-1 w-full">
            <x-user-layout>
                <h1 class="mb-5 text-2xl font-bold">Reviews</h1>

            </x-user-layout>
        </main>

        <div class="w-full">
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
                <div
                    class="flex flex-wrap items-center justify-between gap-4 py-5 mt-5 text-xs border-t border-gray-200 sm:text-sm md:text-base">
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
        </div>
    </div>
</x-layout>
