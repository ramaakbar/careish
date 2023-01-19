<x-layout>
    <x-dash-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <a href="/dashboard/users"
                class="inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Back
            </a>
            <h1 class="my-4 mb-5 text-3xl font-bold">{{ $user->name }}
                <img src="{{ asset('/storage/' . $user->picture) }}" alt="{{ $user->name . ' picture' }}"
                    class="inline w-8 h-8 mr-2 rounded-full">
            </h1>
            <div class="flex justify-between mb-5">
                <div class="flex space-x-4">
                    <div>
                        <p class="text-gray-700">Created at</p>
                        <p>{{ Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">Updated at</p>
                        <p>{{ Carbon\Carbon::parse($user->updated_at)->format('d M Y') }}</p>
                    </div>
                </div>
                <livewire:component.delete-dashboard-detail :user="$user" />
            </div>
            <div class="w-full p-5 mb-8 bg-white border rounded">
                <form action="/dashboard/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="grid grid-cols-1 gap-5 mb-4 md:grid-cols-2 xl:grid-cols-3">
                        <div class="">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $user->name }}">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $user->email }}">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
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

                        <div class="">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select id="role" name="role_id"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @if (old('role_id', $user->role_id) == $user->role_id)
                                    <option value="{{ $user->role_id }}">{{ $user->role->role }}</option>
                                    @if ($user->role_id == 1)
                                        <option value="2">Admin</option>
                                    @elseif($user->role_id == 2)
                                        <option value="1">Member</option>
                                    @endif
                                @else
                                    <option value="1">Member</option>
                                    <option value="2">Admin</option>
                                @endif
                            </select>
                            @error('role_id')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload Profile
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
                        <div class="">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('password')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('password_confirmation')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="flex space-x-4">
                        <button
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">
                            Save
                        </button>
                        <a href="/dashboard/users/{{ $user->id }}"
                            class="block text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="button">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>

            <h2 class="mb-3 text-xl font-bold">Transactions</h2>
            <livewire:dashboard.user-transaction-dashboard-table :user="$user" />

        </main>
    </x-dash-layout>
</x-layout>
