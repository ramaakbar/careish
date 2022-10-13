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
                <h1 class="mb-5 text-2xl font-bold">Profile Setting</h1>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div class="">
                        @if ($user->picture == 'assets/placeholder_profile.jpeg')
                            <img src="{{ asset($user->picture) }}" alt="asdas" class="rounded">
                        @elseif(Str::contains($user->picture, '/storage/'))
                            <img src="{{ asset('/storage/' . $user->picture) }}" alt="asdas" class="rounded">
                        @else
                            <img src="{{ $user->picture }}" alt="asdas" class="rounded">
                        @endif
                    </div>

                    <form class="md:col-span-2" action="/user/profile-setting" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $user->name }}">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $user->email }}">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Phone
                                Number</label>
                            <input type="text" name="phone_number" id="phone"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $user->phone_number }}">
                            @error('phone_number')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                                Profile
                                picture</label>
                            <input
                                class="block w-full text-sm text-gray-900 bg-white border border-gray-300 rounded-lg cursor-pointer"
                                aria-describedby="file_input_help" id="file_input" type="file" name="picture">
                            <input aria-describedby="file_input_help" id="oldPicture" type="hidden" name="oldPicture"
                                value="{{ $user->picture }}">
                            <p class="mt-1 text-sm" id="file_input_help">SVG, PNG, JPG
                                or GIF (MAX. 800x400px).</p>

                            @error('picture')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <button data-modal-toggle="change-password-modal" type="button"
                            class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Change
                            Password</button>
                        <button
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">
                            Update Profile
                        </button>

                    </form>
                    <livewire:user.change-password-modal :user="$user" />
                </div>
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
