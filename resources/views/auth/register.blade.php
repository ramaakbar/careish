<x-layout>
    <div class="flex flex-row">
        <div class="w-full lg:w-8/12">
            <div class="flex flex-col justify-center max-w-xl px-4 pt-8 mx-auto md:pt-0 md:h-screen">
                <div>
                    <a href="/" class="block mb-4 text-3xl font-extrabold text-gray-900">
                        Careish.
                    </a>
                    <h2 class="text-2xl font-bold text-[gray-900] block mb-1">
                        Sign Up
                    </h2>
                    <p class="mb-6 text-[#6B7280]">Create an account to get started</p>
                </div>
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="block mb-2.5 text-base font-medium text-gray-900">Name</label>
                        <input id="name" name="name" type="text"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Your name" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2.5 text-base font-medium text-gray-900">Email</label>
                        <input id="email" name="email" type="text"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2.5 text-base font-medium text-gray-900">Password</label>
                        <div x-data="{ show: false }" class="relative w-full">
                            <input id="password" name="password" :type="show ? 'text' : 'password'"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Password" required>
                            <button @click="show = !show" type="button"
                                class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg :class="show ? '' : 'hidden'" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-4 h-4 text-gray-500 hover:text-gray-900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg :class="show ? 'hidden' : ''" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-4 h-4 text-gray-500 hover:text-gray-900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password_confirmation"
                            class="block mb-2.5 text-base font-medium text-gray-900">Confirm Password</label>
                        <div x-data="{ show: false }" class="relative w-full">
                            <input id="password_confirmation" name="password_confirmation"
                                :type="show ? 'text' : 'password'"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Confirm Password" required>
                            <button @click="show = !show" type="button"
                                class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg :class="show ? '' : 'hidden'" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-4 h-4 text-gray-500 hover:text-gray-900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg :class="show ? 'hidden' : ''" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-4 h-4 text-gray-500 hover:text-gray-900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="block mb-[21px]">
                        <button type="submit" id="createBtn"
                            class="w-full p-3 text-white transition duration-500 ease-in-out bg-[#4950BA] border-indigo-600 rounded hover:bg-blue-900 text-[16px]">Create
                            Account</button>
                    </div>
                    <div class="mb-5">
                        <p class="text-center text-[#6B7280]">or</p>
                    </div>
                    <div class="block mb-[29px]">
                        <a href="/login/google" id="signGoogleBtn"
                            class="w-full p-3 bg-white border-gray-300 border rounded text-[15px] font-medium inline-flex items-center justify-center hover:bg-gray-100 transition duration-500 ease-in-out">
                            <img class="w-6 h-6 mr-2"
                                src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" />
                            Sign up with Google
                        </a>
                    </div>
                    <div class="text-center text-[#6B7280]">
                        Dont have an account yet? <a href="/login"
                            class="text-[#4950BA] font-medium hover:underline transition ease-in-out duration-500">Sign
                            In here</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="bg-cover lg:w-4/12" style="background-image: url('/assets/elder.png')">
            {{-- <img class="w-max h-max" src="/assets/elder.png" alt="" srcset=""> --}}
        </div>
    </div>
</x-layout>
