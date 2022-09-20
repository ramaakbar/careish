<x-layout>
    <div class="flex flex-row">
        <div class="w-full lg:w-8/12">
            <div class="flex flex-col justify-center max-w-xl px-4 pt-8 mx-auto md:pt-0 md:h-screen">
                <div>
                    <x-alert />
                    <a href="/" class="block mb-4 text-3xl font-extrabold text-gray-900">
                        Careish.
                    </a>
                    <h2 class="text-2xl font-bold text-[gray-900] block mb-1">
                        Sign In
                    </h2>
                    <p class="mb-6 text-[#6B7280]">Welcome back! fill in your credentials to login</p>
                </div>
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="email" class="block mb-2.5 text-base font-medium text-gray-900">Email</label>
                        <input id="email" name="email" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2.5 text-base font-medium text-gray-900">Password</label>
                        <input id="password" name="password" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Password" required>
                    </div>
                    <div class="block mb-[21px]">
                        <button type="submit" id="loginBtn" name="loginBtn"
                            class="w-full p-3 text-white transition duration-500 ease-in-out bg-[#4950BA] border-indigo-600 rounded hover:bg-blue-900 text-[16px]">Login</button>
                    </div>
                    <div class="mb-5">
                        <p class="text-center text-[#6B7280]">or</p>
                    </div>
                    <div class="block mb-[29px]">
                        <a href="/login/google" id="signGoogleBtn"
                            class="w-full p-3 border-gray-300 border rounded text-[15px] font-medium inline-flex items-center justify-center hover:bg-gray-100 transition duration-500 ease-in-out">
                            <img class="w-6 h-6 mr-2"
                                src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" />
                            Sign in with Google
                        </a>
                    </div>
                    <div class="text-center text-[#6B7280]">
                        Dont have an account yet? <a href="/register"
                            class="text-[#4950BA] font-medium hover:underline transition ease-in-out duration-500"> Sign
                            Up here </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="bg-cover lg:w-4/12" style="background-image: url('/assets/elder.png')">
            {{-- <img class="w-max h-max" src="/assets/elder.png" alt="" srcset=""> --}}
        </div>
    </div>
</x-layout>
