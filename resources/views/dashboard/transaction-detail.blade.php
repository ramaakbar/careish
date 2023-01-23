<x-layout>
    <x-dash-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <a href="/dashboard/transactions"
                class="inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Back
            </a>
            <h1 class="my-4 mb-5 text-3xl font-bold">Transaction T{{ $transaction->id }}</h1>
            <div class="flex justify-between mb-5">
                <div class="flex space-x-4">
                    <div>
                        <p class="text-gray-700">Created at</p>
                        <p>{{ Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">Updated at</p>
                        <p>{{ Carbon\Carbon::parse($transaction->updated_at)->format('d M Y') }}</p>
                    </div>
                </div>
                <livewire:component.delete-dashboard-detail :transaction="$transaction" />
            </div>
            <div class="w-full p-5 mb-8 bg-white border rounded">
                <form action="/dashboard/transactions/{{ $transaction->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="grid grid-cols-1 gap-5 mb-5 md:grid-cols-2 xl:grid-cols-6">
                        <div class="xl:col-span-3">
                            <label for="user" class="block mb-2 text-sm font-medium text-gray-900 ">User</label>
                            <input name="user" type="text" id="user" aria-label="disabled input"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
                                value="{{ $transaction->user->name }}" disabled>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-3">
                            <label for="nurse" class="block mb-2 text-sm font-medium text-gray-900 ">Nurse</label>
                            <input name="nurse" type="text" id="nurse" aria-label="disabled input"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
                                value="{{ $transaction->nurse->name }}" disabled>
                            @error('nurse')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-2">
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 ">Start
                                Date</label>
                            <input name="start_date" type="date" id="start_date"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $transaction->start_date->format('Y-m-d') }}">
                            @error('start_date')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="xl:col-span-2">
                            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 ">End Date</label>
                            <input name="end_date" type="date" id="end_date"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $transaction->end_date->format('Y-m-d') }}">
                            @error('end_date')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-2">
                            <label for="total_price" class="block mb-2 text-sm font-medium text-gray-900 ">Nurse
                                Wage</label>
                            <input name="total_price" type="text" id="total_price"
                                class="bg-white cursor-not-allowed border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $transaction->nurse->price }}" disabled>
                            @error('total_price')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-2">
                            <label for="payment_type_id" class="block mb-2 text-sm font-medium text-gray-900 ">Payment
                                Type</label>
                            <select type="payment_type_id" name="payment_type_id" id="payment_type_id"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($payment_types as $payment_type)
                                    @if (old('payment_type_id', $transaction->payment_type_id) == $payment_type->id)
                                        <option value="{{ $payment_type->id }}" selected>
                                            {{ $payment_type->type }}
                                        </option>
                                    @else
                                        <option value="{{ $payment_type->id }}">{{ $payment_type->type }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('payment_type_id')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-2">
                            <label for="total_price" class="block mb-2 text-sm font-medium text-gray-900 ">Total
                                Price</label>
                            <input name="total_price" type="text" id="total_price"
                                class="bg-white cursor-not-allowed border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $transaction->price }}" disabled>
                            @error('total_price')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-2">
                            <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                            <select type="status_id" name="status_id" id="status_id"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($statuses as $status)
                                    @if (old('status_id', $transaction->status_id) == $status->id)
                                        <option value="{{ $status->id }}" selected>
                                            {{ $status->status }}
                                        </option>
                                    @else
                                        <option value="{{ $status->id }}">{{ $status->status }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('payment_type_id')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-6">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                            <input name="address" type="text" id="address"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $transaction->address }}">
                            @error('address')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <livewire:component.province-city-select :province_id="$transaction->city->province_id" :city_id="$transaction->city_id">
                        <div class="flex space-x-4">
                            <button
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">
                                Save
                            </button>
                            <a href="/dashboard/transactions/{{ $transaction->id }}"
                                class="block text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="button">
                                Cancel
                            </a>
                        </div>

                </form>
            </div>

        </main>
    </x-dash-layout>
</x-layout>
