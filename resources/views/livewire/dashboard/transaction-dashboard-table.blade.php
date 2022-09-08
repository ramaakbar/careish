<div>
    <div class="flex flex-wrap gap-5 mb-5">
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
                <input wire:model.debounce.300ms="search" type="search" id="simple-search"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="Search" required>
            </div>
        </div>
        <div class="w-1/3 lg:w-1/6">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Data Per Page</label>
            <select wire:model="perPage"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                id="">
                <option value=10 selected>10</option>
                <option value=20>20</option>
                <option value=50>50</option>
            </select>
        </div>

        <div class="w-1/3 lg:w-1/6">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Sort By</label>
            <select wire:model="sort"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                id="">
                <option value="id" selected>Id</option>
                <option value="name">Name</option>
                <option value="Date">Date</option>
            </select>
        </div>

        <div class="w-1/4 lg:w-1/6">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Sort Order</label>
            <select wire:model="sortOrder"
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
                            <div href="" class="flex items-center cursor-pointer" wire:click="SetClicked('user')">
                                User
                                @if ($sort == 'user' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'user' && $sortOrder == 'desc')
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
                            <div href="" class="flex items-center cursor-pointer" wire:click="SetClicked('nurse')">
                                Nurse
                                @if ($sort == 'nurse' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'nurse' && $sortOrder == 'desc')
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
                            <div href="" class="flex items-center cursor-pointer" wire:click="SetClicked('total_price')">
                                Total Price
                                @if ($sort == 'total_price' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'total_price' && $sortOrder == 'desc')
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
                            <div href="" class="flex items-center cursor-pointer" wire:click="SetClicked('start_date')">
                                Start Date
                                @if ($sort == 'start_date' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'start_date' && $sortOrder == 'desc')
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
                            <div href="" class="flex items-center cursor-pointer" wire:click="SetClicked('end_date')">
                                End Date
                                @if ($sort == 'end_date' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'end_date' && $sortOrder == 'desc')
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
                            <div href="" class="flex items-center cursor-pointer" wire:click="SetClicked('status_id')">
                                Status
                                @if ($sort == 'status_id' && $sortOrder == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-3 h-3 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @elseif($sort == 'status_id' && $sortOrder == 'desc')
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
                    @forelse ($transactions as $transaction)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                T{{ $transaction->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $transaction->user }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->nurse }}
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ $transaction->total_price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->start_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->end_date }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($transaction->status == 'Cancelled')
                                    <span
                                        class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Cancelled</span>
                                @elseif($transaction->status == 'On Going')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $transaction->status }}</span>
                                @else
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $transaction->status }}</span>
                                @endif
                            </td>
                            <td class="flex flex-wrap gap-1 px-6 py-4">
                                <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">No
                                transactions available</th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        @if ($transactions->count())
            <div class="p-4">
                {{ $transactions->links() }}
            </div>
        @endif

    </div>
</div>
