<x-main-layout>
    <div class="px-5 mx-auto mb-8 scroll-m-16 max-w-7xl">
        <h1 class="text-3xl font-bold text-center sm:text-left">Transaction Status</h1>
        <div class="mt-8 w-full shadow-[0_0_16px_-8px_rgba(107,114,128,1.000)] border-white h-max rounded-lg ">
            <div class="px-8 py-10 sm:px-14">
                <div class="flex flex-col justify-between lg:flex-row">
                    <div class="flex flex-col items-center sm:flex-row sm:items-start">
                        <img class="w-20 h-20 rounded-full sm:mr-7" src="{{ asset('/storage/' . Auth::user()->picture) }}"
                            alt="user photo">
                        <div class="flex flex-col items-center justify-between py-3 mt-3 sm:mt-0 sm:items-start">
                            <h2 class="text-lg font-medium sm:text-xl">{{ Auth::user()->name }}</h2>
                            <p class="text-sm text-gray-500 sm:text-lg">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center sm:items-start lg:items-end">
                        <div class="flex justify-center mt-2 sm:justify-start lg:justify-end w-80 lg:mt-0">
                            <p class="text-gray-500">{{ $transaction->address }}</p>
                        </div class="">
                        <p class="text-gray-500 lg:text-right">
                            {{ $transaction->city->name }}, {{ $transaction->city->province->name }}
                        </p>
                    </div>

                </div>
                <div class="mt-10">
                    <div
                        class="relative box-border flex flex-col bg-[#504BE5] rounded-xl px-6 sm:px-10 py-6 sm:py-10 text-white">
                        <svg viewBox="0 0 383 310" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="absolute top-0 hidden h-full -right-12 opacity-10 sm:block">
                            <path
                                d="M543 155C543 313.876 425.098 439 284 439C142.902 439 25 313.876 25 155C25 -3.87631 142.902 -129 284 -129C425.098 -129 543 -3.87631 543 155Z"
                                stroke="white" stroke-width="50" />
                        </svg>
                        <div class="flex flex-col items-center justify-between xs:flex-row">
                            <p class="text-base font-bold sm:text-xl md:text-3xl ">Your Transaction ID</p>
                            <p class="text-sm font-bold sm:text-base md:text-xl">{{ $transaction->id }}</p>
                        </div>
                        <div class="mt-4 space-y-3 xs:space-y-1">
                            <div class="flex flex-col items-center justify-between xs:flex-row">
                                <p class="text-sm font-medium sm:text-base md:text-lg ">Payment Method</p>
                                <p class="text-sm font-medium sm:text-base md:text-lg">
                                    {{ $transaction->payment_type->type }}</p>
                            </div>
                            <div class="flex flex-col items-center justify-between xs:flex-row">
                                <p class="text-sm font-medium sm:text-base md:text-lg ">Transaction Date</p>
                                <p class="text-sm font-medium sm:text-base md:text-lg">
                                    {{ date_format($transaction->created_at, 'd F Y') }}
                                </p>
                            </div>

                            <div class="flex flex-col items-center justify-between xs:flex-row">
                                <p class="text-sm font-medium sm:text-base md:text-lg ">Status</p>
                                <p class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $transaction->status->status }} For Approval</p>
                            </div>
                            <div class="flex flex-col items-center justify-between xs:flex-row">
                                <p class="text-sm font-medium sm:text-base md:text-lg ">Start Date</p>
                                <p class="text-sm font-medium sm:text-base md:text-lg">
                                    {{ date_format($transaction->start_date, 'd F Y') }}
                                </p>
                            </div>
                            <div class="flex flex-col items-center justify-between xs:flex-row">
                                <p class="text-sm font-medium sm:text-base md:text-lg ">End Date</p>
                                <p class="text-sm font-medium sm:text-base md:text-lg">
                                    {{ date_format($transaction->end_date, 'd F Y') }}
                                </p>
                            </div>
                            <div class="flex flex-col items-center justify-between xs:flex-row">
                                <p class="text-sm font-medium sm:text-base md:text-lg ">Nurse Wage</p>
                                <p class="text-sm font-medium sm:text-base md:text-lg">
                                    Rp{{ number_format($transaction->nurse->price, 2, ',', '.') }}</p>
                            </div>
                            <div class="flex flex-col items-center justify-between xs:flex-row">
                                <p class="text-sm font-medium sm:text-base md:text-lg ">Total Price</p>
                                <p class="text-sm font-medium sm:text-base md:text-lg">
                                    Rp{{ number_format($transaction->price, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <h2 class="text-2xl font-medium">Nurse Detail</h2>
                    <div class="relative overflow-x-auto">
                        <hr class="mt-3">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="py-3 pr-6">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Provinsi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kota / Kabupaten
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Gender
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Age
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="py-4 pr-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $transaction->nurse->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $transaction->city->province->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $transaction->city->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $transaction->nurse->gender->gender }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $transaction->nurse->age }} years old
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="mt-4 text-sm text-red-400">*Gaji perawat langsung diberikan oleh pengguna jasa perawat
                    </p>
                </div>
                <div class="flex justify-end">
                    <a class="transition duration-300 ease-in-out block w-full sm:w-24 py-3 mt-6 text-sm font-medium text-center text-white bg-[#504BE5] rounded-lg hover:bg-[#3a36a8] focus:ring-4 focus:outline-none focus:ring-blue-300"
                        href="/user/transaction-list">
                        Done
                    </a>
                </div>
            </div>
        </div>
</x-main-layout>
