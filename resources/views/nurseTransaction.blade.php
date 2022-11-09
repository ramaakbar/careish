<x-main-layout>
    <div class="px-5 mx-auto mb-8 scroll-m-16 max-w-7xl">
        <h1 class="text-3xl font-bold">Confirm Order</h1>
        <div class="flex flex-col justify-between w-full mt-5 space-y-7 md:flex-row md:space-y-0">
            <div
                class="w-full md:w-2/3 shadow-[0_0_16px_-8px_rgba(107,114,128,1.000)] border-white h-max mr-5 rounded-lg ">
                <div class="py-10 px-14">
                    <h1 class="mb-8 text-2xl font-bold">Nurse Detail</h1>
                    <div class="grid w-full grid-cols-3 gap-20">
                        <div class="">
                            <img src="{{ asset($nurse->picture) }}" alt="" class="w-max">
                        </div>
                        <div class="flex flex-col justify-center col-span-2 text-lg font-medium">
                            <div class="flex justify-between">
                                <p class="w-full text-gray-400">Name</p>
                                <p class="w-full text-right">{{ $nurse->name }}</p>
                            </div>
                            <div class="flex justify-between mt-2">
                                <p class="w-full text-gray-400">Provinsi</p>
                                <p class="w-full text-right">{{ $nurse->city->province->name }}</p>
                            </div>
                            <div class="flex justify-between mt-2">
                                <p class="w-full text-gray-400">Kota / Kabupaten</p>
                                <p class="w-full text-right">{{ $nurse->city->name }}</p>
                            </div>
                            <div class="flex justify-between mt-2">
                                <p class="w-full text-gray-400">Gender</p>
                                <p class="w-full text-right">{{ $nurse->gender->gender }}</p>
                            </div>
                            <div class="flex justify-between mt-2">
                                <p class="w-full text-gray-400">Price</p>
                                <p class="w-full text-right">Rp{{ number_format($nurse->price, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="w-full md:w-1/3 border h-max shadow-[0_0_16px_-8px_rgba(107,114,128,1.000)] border-white rounded-lg">
                <div class="w-full p-8">
                    <h1 class="mb-4 text-2xl font-bold">Summary</h1>
                    <div class="">
                        <p class="">Price</p>
                        <p>Admin Fee</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
