<x-layout>
    <x-dashboard-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <h1 class="mb-5 text-3xl font-bold">Dashboard</h1>
            <div class="flex flex-col items-center mb-10 space-y-5 md:space-x-5 lg:space-x-10 md:space-y-0 md:flex-row">
                <div class="flex justify-between w-full p-3 bg-white border rounded md:w-1/3 item-center">
                    <div>
                        <p>Transactions this week</p>
                        <h2 class="text-2xl font-bold">2300</h2>
                    </div>
                    <div class="flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-14 h-14">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                    </div>
                </div>
                <div class="flex justify-between w-full p-3 bg-white border rounded md:w-1/3 item-center">
                    <div>
                        <p>Transactions this week</p>
                        <h2 class="text-2xl font-bold">2300</h2>
                    </div>
                    <div class="flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-14 h-14">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                    </div>

                </div>
                <div class="flex justify-between w-full p-3 bg-white border rounded md:w-1/3 item-center">
                    <div>
                        <p>Transactions this week</p>
                        <h2 class="text-2xl font-bold">2300</h2>
                    </div>
                    <div class="flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-14 h-14">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                    </div>

                </div>
            </div>
            <div class="flex flex-col space-y-5 lg:flex-row lg:space-x-10 lg:space-y-0 ">
                <div class="w-full bg-white border rounded lg:w-1/2 max-h-[100vh]">
                    <div class="flex items-center justify-between p-4">
                        <h2 class="text-xl font-bold">Latest Transaction</h2>
                        <a href="/dashboard/transactions"
                            class="text-sm text-[#4950BA] font-medium hover:underline transition ease-in-out duration-500">View
                            all</a>
                    </div>

                    <div class="overflow-x-auto rounded max-h-96">
                        <table class="w-full h-full text-sm text-left text-gray-500">
                            <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            T{{ $transaction->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $transaction->created_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($transaction->status->status == 'Cancelled')
                                                <span
                                                    class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $transaction->status->status }}</span>
                                            @elseif($transaction->status->status == 'On Going')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $transaction->status->status }}</span>
                                            @else
                                                <span
                                                    class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $transaction->status->status }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp. {{ $transaction->total_price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">There is no
                                            transactions</th>
                                    </tr>
                                @endforelse



                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="w-full overflow-x-auto bg-white border rounded lg:w-1/2 max-h-[100vh]">
                    <div class="flex items-center justify-between p-4">
                        <h2 class="text-xl font-bold">Nurses Availability</h2>
                        <a href="/dashboard/nurses"
                            class="text-sm text-[#4950BA] font-medium hover:underline transition ease-in-out duration-500">View
                            all</a>
                    </div>

                    <div class="overflow-x-auto rounded max-h-96">
                        <table class="w-full h-full text-sm text-left text-gray-500">
                            <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Available
                                    </th>
                                    {{-- <th scope="col" class="px-6 py-3">
                                        Total Price
                                    </th> --}}
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($nurses as $nurse)
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            N{{ $nurse->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $nurse->name }}
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
                                        {{-- <td class="px-6 py-4">
                                        $2999
                                    </td> --}}
                                        <td class="px-6 py-4">
                                            <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">No
                                            nurses available right now</th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </main>
    </x-dashboard-layout>
</x-layout>
