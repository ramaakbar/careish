<x-layout>
    <x-dash-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <h1 class="mb-5 text-3xl font-bold">Dashboard</h1>
            <div class="flex flex-col items-center mb-10 space-y-5 md:space-x-5 lg:space-x-10 md:space-y-0 md:flex-row">
                <div class="flex justify-between w-full p-3 bg-white border rounded md:w-1/3 item-center">
                    <div>
                        <p>Transactions this week</p>
                        <h2 class="text-2xl font-bold">{{ $transWeek }}</h2>
                    </div>
                    <div class="flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.8"
                            stroke="currentColor" class="w-14 h-14">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                    </div>
                </div>
                <div class="flex justify-between w-full p-3 bg-white border rounded md:w-1/3 item-center">
                    <div>
                        <p>Income this week</p>
                        <h2 class="text-2xl font-bold">Rp{{ number_format($income, 2, ',', '.') }}</h2>
                    </div>
                    <div class="flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.8"
                            stroke="currentColor" class="w-14 h-14">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>

                    </div>

                </div>
                <div class="flex justify-between w-full p-3 bg-white border rounded md:w-1/3 item-center">
                    <div>
                        <p>New user this week</p>
                        <h2 class="text-2xl font-bold">{{ $regiseredUser }}</h2>
                    </div>
                    <div class="flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.8"
                            stroke="currentColor" class="w-14 h-14">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>

                    </div>

                </div>
            </div>
            <div class="flex flex-col space-y-5 lg:flex-row lg:space-x-10 lg:space-y-0 ">
                <div class="w-full bg-white border rounded lg:w-1/2 max-h-[100vh]">
                    <div class="flex items-center justify-between p-4">
                        <h2 class="text-xl font-bold">Latest Transaction</h2>
                        <a href="/dashboard/transactions"
                            class="text-sm font-medium text-blue-600 transition duration-500 ease-in-out hover:underline">View
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
                                            {{ $transaction->created_at->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($transaction->status_id == '1')
                                                <span
                                                    class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Cancelled</span>
                                            @elseif($transaction->status_id == '2')
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">Waiting
                                                    For Approval</span>
                                            @elseif($transaction->status_id == '3')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">On
                                                    Going</span>
                                            @else
                                                <span
                                                    class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Done</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            Rp{{ number_format($transaction->price, 2, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="/dashboard/transactions/{{ $transaction->id }}"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
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
                            class="text-sm font-medium text-blue-600 transition duration-500 ease-in-out hover:underline">View
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
                                        Province
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Available
                                    </th>
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
                                            {{ $nurse->city->province->name }}
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
                                        <td class="px-6 py-4">
                                            <a href="/dashboard/nurses/{{ $nurse->id }}"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
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
    </x-dash-layout>
</x-layout>
