<div>
    <div class="grid grid-cols-12 gap-5 mb-5 ">
        <div class="col-span-12 lg:col-span-4">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Search</label>
            <div class="relative ">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input wire:model.debounce.300ms="search" type="search" id="simple-search"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="Search" required>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-2">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Data Per Page</label>
            <select wire:model="perPage"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                id="">
                <option value=10 selected>10</option>
                <option value=20>20</option>
                <option value=50>50</option>
            </select>
        </div>

        <div class="col-span-12 lg:col-span-2">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
            <select wire:model="status"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                id="">
                <option value="" selected>All</option>
                @foreach ($statuses as $status)
                    <option value={{ $status->id }}>{{ $status->availability }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-span-12 lg:col-span-2">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
            <select wire:model="gender"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                id="">
                <option value="" selected>All</option>
                <option value="2">Female</option>
                <option value="1">Male</option>
            </select>
        </div>

        <div class="col-span-12 lg:col-span-2">
            <!-- Modal toggle -->
            <label for="" class="block mb-2 text-sm font-medium text-white">Button</label>
            <button
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                onclick="$openModal('cardModal')">
                Add Nurse
            </button>
        </div>
    </div>

    <div class="w-full bg-white border rounded">
        <div class="overflow-x-auto rounded max-h-[60vh]">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="sticky top-0 w-full text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <div href="" class="flex items-center cursor-pointer" wire:click="SetClicked('id')">
                                Id
                                @if ($sort == 'id' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'id' && $sortOrder == 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                            </div>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div href="" class="flex items-center cursor-pointer"
                                wire:click="SetClicked('name')">
                                Name
                                @if ($sort == 'name' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'name' && $sortOrder == 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                            </div>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div href="" class="flex items-center cursor-pointer"
                                wire:click="SetClicked('province_id')">
                                Province
                                @if ($sort == 'province_id' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'province_id' && $sortOrder == 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                            </div>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div href="" class="flex items-center cursor-pointer"
                                wire:click="SetClicked('city_id')">
                                City
                                @if ($sort == 'city_id' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'city_id' && $sortOrder == 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                            </div>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div href="" class="flex items-center cursor-pointer"
                                wire:click="SetClicked('gender_id')">
                                Gender
                                @if ($sort == 'gender_id' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'gender_id' && $sortOrder == 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                            </div>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div href="" class="flex items-center cursor-pointer"
                                wire:click="SetClicked('availability_id')">
                                Status
                                @if ($sort == 'availability_id' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'availability_id' && $sortOrder == 'desc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                            </div>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr wire:loading>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Loading...
                        </th>
                    </tr>
                    @forelse ($nurses as $nurse)
                        <tr wire:loading.remove class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                N{{ $nurse->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $nurse->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $nurse->city->province->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $nurse->city->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $nurse->gender->gender }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($nurse->availability->availability == 'Not Available')
                                    <span
                                        class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $nurse->availability->availability }}</span>
                                @elseif($nurse->availability->availability == 'On Duty')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $nurse->availability->availability }}</span>
                                @else
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $nurse->availability->availability }}</span>
                                @endif
                            </td>
                            <td class="flex flex-wrap gap-1 px-6 py-4">
                                <a href="nurses/{{ $nurse->id }}"
                                    class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                <button wire:click="deleteConfirm({{ $nurse->id }})"
                                    class="px-3 font-medium text-red-600 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">No
                                nurses available</th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        @if ($nurses->count())
            <div class="p-4">
                {{ $nurses->links() }}
            </div>
        @endif

    </div>
</div>
