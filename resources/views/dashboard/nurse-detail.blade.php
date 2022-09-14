<x-layout>
    <x-dashboard-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <x-alert />
            <a href="/dashboard/nurses"
                class="inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Back
            </a>
            <h1 class="my-4 mb-5 text-3xl font-bold">Nurse {{ $nurse->name }}</h1>
            <div>
                <img src="{{ $nurse->picture == 'assets/placeholder_man.jpeg' ? asset($nurse->picture) : asset('/storage/' . $nurse->picture) }}"
                    alt="" class="w-48">
            </div>
            <div class="flex justify-between mb-5">
                <div class="flex space-x-4">
                    <div>
                        <p class="text-gray-700">Created at</p>
                        <p>{{ Carbon\Carbon::parse($nurse->created_at)->diffForHumans() }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">Updated at</p>
                        <p>{{ Carbon\Carbon::parse($nurse->updated_at)->diffForHumans() }}</p>
                    </div>
                </div>
                <button data-modal-toggle="confirm-modal"
                    class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    type="button">
                    Delete
                </button>
            </div>
            <div class="w-full p-5 mb-8 bg-white border rounded">
                <form action="/dashboard/nurses/{{ $nurse->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="grid grid-cols-1 gap-5 mb-4 md:grid-cols-2 xl:grid-cols-3">
                        <div class="">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $nurse->name }}">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="gender_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Gender</label>
                            <select id="gender_id" name="gender_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @if (old('gender_id', $nurse->gender_id) == $nurse->gender_id)
                                    <option value="{{ $nurse->gender_id }}">{{ $nurse->gender->gender }}</option>
                                    @if ($nurse->gender_id == 1)
                                        <option value="2">Female</option>
                                    @elseif($nurse->gender_id == 2)
                                        <option value="1">Male</option>
                                    @endif
                                @else
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                @endif
                            </select>
                            @error('role_id')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 ">Age</label>
                            <input type="number" name="age" id="age"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $nurse->age }}">
                            @error('age')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                            <input type="address" name="address" id="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $nurse->address }}">
                            @error('address')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="">
                            <label for="availability_id"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Availability</label>
                            <select type="availability_id" name="availability_id" id="availability_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($availabilities as $availability)
                                    @if (old('availability_id', $nurse->availability_id) == $availability->id)
                                        <option value="{{ $availability->id }}" selected>
                                            {{ $availability->availability }}
                                        </option>
                                    @else
                                        <option value="{{ $availability->id }}">{{ $availability->availability }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('availability_id')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                for="file_input">Upload Profile picture</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                aria-describedby="file_input_help" id="file_input" type="file" name="picture">
                            <input aria-describedby="file_input_help" id="oldPicture" type="hidden" name="oldPicture"
                                value="{{ $nurse->picture }}">
                            <p class="mt-1 text-sm" id="file_input_help">SVG, PNG, JPG
                                or GIF (MAX. 800x400px).</p>

                            @error('picture')
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
                        <a href="/dashboard/nurses/{{ $nurse->id }}"
                            class="block text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="button">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>

            <h2 class="mb-3 text-xl font-bold">Transactions</h2>
            <livewire:dashboard.nurse-transaction-dashboard-table :nurse="$nurse" />

            {{-- confirm modal --}}
            <div id="confirm-modal" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                    <div class="relative bg-white rounded-lg shadow">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-toggle="confirm-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this
                                product?</h3>
                            <form action="/dashboard/nurses/{{ $nurse->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button data-modal-toggle="confirm-modal" type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Yes, I'm sure
                                </button>
                                <button data-modal-toggle="confirm-modal" href="" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                    cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </x-dashboard-layout>
</x-layout>
