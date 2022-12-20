<x-layout>
    <x-dashboard-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <a href="/dashboard/nurses"
                class="inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Back
            </a>
            <h1 class="my-4 mb-5 text-3xl font-bold">Nurse {{ $nurse->name }}</h1>
            <div>
                <img src="{{ asset('/storage/' . $nurse->picture) }}" alt="{{ $nurse->name . ' picture' }}" class="w-48">
            </div>
            <div class="flex justify-between mb-5">
                <div class="flex space-x-4">
                    <div>
                        <p class="text-gray-700">Created at</p>
                        <p>{{ Carbon\Carbon::parse($nurse->created_at)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">Updated at</p>
                        <p>{{ Carbon\Carbon::parse($nurse->updated_at)->format('d M Y') }}</p>
                    </div>
                </div>
                <livewire:component.delete-dashboard-detail :nurse="$nurse" />
            </div>
            <div class="w-full p-5 mb-8 bg-white border rounded">
                <form action="/dashboard/nurses/{{ $nurse->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="grid grid-cols-1 gap-5 mb-4 md:grid-cols-2 xl:grid-cols-3">
                        <div class="">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $nurse->name }}">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="gender_id" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                            <select id="gender_id" name="gender_id"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $nurse->age }}">
                            @error('age')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                            <input type="number" name="price" id="price"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $nurse->price }}">
                            @error('price')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="">
                            <label for="availability_id"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Availability</label>
                            <select type="availability_id" name="availability_id" id="availability_id"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload Profile
                                picture</label>
                            <input
                                class="block w-full text-sm text-gray-900 bg-white border border-gray-300 rounded-lg cursor-pointer"
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


                        <div class="">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nurse's description">{{ $nurse->description }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <livewire:component.province-city-select :province_id="$nurse->city->province_id" :city_id="$nurse->city_id">

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

        </main>
    </x-dashboard-layout>
</x-layout>
