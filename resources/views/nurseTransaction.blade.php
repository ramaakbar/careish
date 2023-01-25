<x-main-layout>
    <div class="md:px-5 mx-auto mb-8 scroll-m-16 max-w-7xl">
        <h1 class="px-5 text-3xl font-bold">Confirm Order</h1>
        <form action="/trans/{{ $nurse->id }}/confirmation" method="POST">
            <div class="flex flex-col justify-between w-full mt-5 space-y-7 md:flex-row md:space-y-0">
                <div
                    class="w-full md:w-2/3 shadow-[0_0_16px_-8px_rgba(107,114,128,1.000)] border-white h-max mr-5 rounded-lg ">
                    <div class="p-5 md:p-8">
                        <div class="">
                            <h1 class="mb-8 text-2xl font-bold">Nurse Detail</h1>
                            <div class="grid w-full grid-cols-3 gap-20">
                                <div class="col-span-3 md:col-span-1">
                                    <img src="{{ asset('/storage/' . $nurse->picture) }}" alt="" class="w-max">
                                </div>
                                <div class="flex flex-col justify-center col-span-3 text-lg font-medium md:col-span-2">
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
                                        <p class="w-full text-gray-400">Wage</p>
                                        <p class="w-full text-right">Rp{{ number_format($nurse->price, 2, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <h1 class="mb-8 text-2xl font-bold">Transaction Detail</h1>
                            <div class="">
                                @csrf
                                <div class="mb-5">
                                    <label for="name"
                                        class="block mb-2.5 text-base font-medium text-gray-900">Name</label>
                                    <input id="name" name="name" type="text"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Name" value="{{ Auth::user()->name }}" required>
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                                snapp!</span> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="address"
                                        class="block mb-2.5 text-base font-medium text-gray-900">Address</label>
                                    <div x-data="{ show: false }" class="relative w-full">
                                        <input id="address" name="address" :type="show ? 'text' : 'address'"
                                            class="bg-white border border-gray-300 text-gay-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ old('address') }}" placeholder="Address" required>
                                    </div>
                                    @error('address')
                                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                                snapp!</span> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <livewire:component.province-city-select>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                    <div class="">
                                        <label for="start_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">Start
                                            Date</label>
                                        <input x-model="min" name="start_date" type="date" id="start_date"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ old('start_date') }}" required min={{ now() }}>
                                        @error('start_date')
                                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                                    snapp!</span> {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <label for="end_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">Duration</label>
                                        <select
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            id="duration" name="duration">
                                            @for ($i = 1; $i <= 60; $i++)
                                                <option value='{{ $i }}'>{{ $i }} Months
                                                </option>
                                            @endfor
                                            @error('duration')
                                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                                        snapp!</span> {{ $message }}</p>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="payment_method"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Payment Method</label>
                                    <select type="payment_method" name="payment_method" id="payment_method"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        @foreach ($paymentMethod as $method)
                                            @if (old('payment_method', $method->type) == $method->type)
                                                <option value="{{ $method->id }}" selected>
                                                    {{ $method->type }}
                                                </option>
                                            @else
                                                <option value="{{ $method->id }}">{{ $method->type }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('payment_method')
                                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                                snapp!</span> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full md:w-1/3 border h-max shadow-[0_0_16px_-8px_rgba(107,114,128,1.000)] border-white rounded-lg">
                    <div class="w-full p-5 md:p-8">
                        <h1 class="mb-4 text-2xl font-bold">Summary</h1>
                        <div class="">
                            <div class="flex justify-between mt-3">
                                <p class="text-gray-400">Service Fee</p>
                                <p class="font-medium">Rp{{ number_format($serviceFee, 2, ',', '.') }}</p>
                            </div>
                            <div class="flex justify-between mt-3">
                                <p class="text-gray-400">Tax 2%</p>
                                <p class="font-medium">Rp{{ number_format($taxFee, 2, ',', '.') }}
                                </p>
                            </div>
                            <hr class="mt-3">
                            <div class="flex justify-between mt-3">
                                <p class="text-gray-400">Total Price</p>
                                <p class="font-medium">
                                    Rp{{ number_format($totalPrice, 2, ',', '.') }}</p>
                            </div>
                        </div>
                        <button
                            class="block w-full py-3 mt-6 text-sm font-medium text-center text-white bg-[#504BE5] rounded-lg hover:bg-[#3a36a8] focus:ring-4 focus:outline-none focus:ring-blue-300"
                            type="submit">
                            Order Now
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-main-layout>
