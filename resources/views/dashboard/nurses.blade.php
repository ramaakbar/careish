<x-layout>
    <x-dashboard-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <h1 class="mb-5 text-3xl font-bold">Nurses</h1>
            <livewire:nurses-dashboard-table>
            {{-- <div class="flex flex-wrap gap-5 mb-5">
                <div class="w-full lg:w-2/6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Search</label>
                    <div class="relative ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                        <input type="search" id="simple-search"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            placeholder="Search" required>
                    </div>
                </div>
                <div class="w-1/3 lg:w-1/6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Data Per Page</label>
                    <select
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                        id="">
                        <option value=10 selected>10</option>
                        <option value=20>20</option>
                        <option value=50>50</option>
                    </select>
                </div>

                <div class="w-1/3 lg:w-1/6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Sort By</label>
                    <select
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                        id="">
                        <option value="id" selected>Id</option>
                        <option value="name">Name</option>
                        <option value="Date">Date</option>
                    </select>
                </div>

                <div class="w-1/4 lg:w-1/6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Sort Order</label>
                    <select
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                        id="">
                        <option value="asc" selected>Asc</option>
                        <option value="desc">Desc</option>
                    </select>
                </div>
            </div>

            <div class="w-full bg-white border rounded">
                <div class="overflow-x-auto rounded max-h-[60vh]">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="sticky top-0 w-full text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gender
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($nurses as $nurse)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        N{{ $nurse->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $nurse->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $nurse->address }}
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
                                        <a href="#"
                                            class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                        <a href="#"
                                            class="px-3 font-medium text-red-600 hover:underline">Delete</a>
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

            </div> --}}
        </main>
    </x-dashboard-layout>
</x-layout>
