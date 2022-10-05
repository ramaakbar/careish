<x-layout>
    <x-dashboard-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <x-alert />
            <a href="/dashboard/transactions"
                class="inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Back
            </a>
            <h1 class="my-4 mb-5 text-3xl font-bold">Transaction T{{ $transaction->id }}</h1>
            <div class="flex justify-between mb-5">
                <div class="flex space-x-4">
                    <div>
                        <p class="text-gray-700">Created at</p>
                        <p>{{ Carbon\Carbon::parse($transaction->created_at)->diffForHumans() }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">Updated at</p>
                        <p>{{ Carbon\Carbon::parse($transaction->updated_at)->diffForHumans() }}</p>
                    </div>
                </div>
                <button data-modal-toggle="confirm-modal"
                    class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    type="button">
                    Delete
                </button>
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
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $transaction->start_date->format('Y-m-d') }}">
                            @error('start_date')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="xl:col-span-2">
                            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 ">End Date</label>
                            <input name="end_date" type="date" id="end_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $transaction->end_date->format('Y-m-d') }}">
                            @error('end_date')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-2">
                            <label for="duration_id"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Duration</label>
                            <select type="duration_id" name="duration_id" id="duration_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($durations as $duration)
                                    @if (old('duration_id', $transaction->duration_id) == $duration->id)
                                        <option value="{{ $duration->id }}" selected>
                                            {{ $duration->duration }}
                                        </option>
                                    @else
                                        <option value="{{ $duration->id }}">{{ $duration->duration }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('duration_id')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-2">
                            <label for="payment_type_id" class="block mb-2 text-sm font-medium text-gray-900 ">Payment
                                Type</label>
                            <select type="payment_type_id" name="payment_type_id" id="payment_type_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $transaction->total_price }}">
                            @error('total_price')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="xl:col-span-2">
                            <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                            <select type="status_id" name="status_id" id="status_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                            <input name="address" type="text" id="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
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
            {{-- <h2 class="mb-3 text-xl font-bold">Transactions</h2>
          <livewire:dashboard.user-transaction-dashboard-table :user="$user"/> --}}

            {{-- confirm modal --}}
            <div id="confirm-modal" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                    <div class="relative bg-white rounded-lg shadow">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-toggle="confirm-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this
                                product?</h3>
                            <form action="/dashboard/transactions/{{ $transaction->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button data-modal-toggle="confirm-modal" type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Yes, I'm sure
                                </button>
                                <button data-modal-toggle="confirm-modal" href="" type="button"
                                    class="text-gray-500 bg-white hover:bg-white focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                    cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </x-dashboard-layout>
</x-layout>
