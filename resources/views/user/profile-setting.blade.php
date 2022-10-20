<x-main-layout>
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

            <form class="md:col-span-2" action="/user/profile-setting" method="POST" enctype="multipart/form-data">
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

</x-main-layout>
