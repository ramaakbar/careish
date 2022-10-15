<div>
    <div class="flex items-center justify-between mb-5">
        <h1 class="text-2xl font-bold">Transaction List</h1>
        <div class="flex items-center space-x-3">
            <label for="" class="block text-sm font-medium text-gray-900">Status</label>
            <select wire:model="status" id="gender_id" name="gender_id"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-32">
                <option value="" selected>All</option>
                <option value="3">Done</option>
                <option value="2">On Going</option>
                <option value="1">Cancelled</option>
            </select>
        </div>
    </div>

    <div class="space-y-5">
        @forelse ($transactions as $transaction)
            <div class="w-full p-3 bg-white border rounded">
                <div class="flex flex-wrap items-center mb-5 space-x-5">
                    <h3 class="text-xl font-semibold">T{{ $transaction->id }}</h3>
                    <p class="text-gray-600">{{ $transaction->created_at }}</p>
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
                </div>
                <div class="space-y-3">
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="w-24 font-medium">Nurse</h4>
                        <div class="flex items-center"><img class="w-8 h-8 mr-2 rounded-full"
                                src="/assets/placeholder_man.jpeg" alt="user photo">
                            <span class="text-gray-600">{{ $transaction->nurse->name }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="w-24 font-medium">Date</h4>
                        <p class="text-gray-600">{{ $transaction->start_date }} -
                            {{ $transaction->end_date }}
                        </p>
                    </div>
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="w-24 font-medium">Address</h4>
                        <p class="text-gray-600">{{ $transaction->address }}</p>
                    </div>
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="w-24 font-medium">Price</h4>
                        <p class="text-gray-600">Rp. {{ $transaction->total_price }}</p>
                    </div>
                    <div class="flex justify-end">
                        <button wire:click.prevent="getTransId({{ $transaction->id }})" data-modal-toggle="transDetail"
                            type="button"
                            class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                            See Detail
                        </button>

                    </div>
                </div>
            </div>
        @empty
            <p>Your transaction is Empty.</p>
        @endforelse

        @if ($transactions->count())
            <div class="p-4">
                {{ $transactions->links() }}
            </div>
        @endif

        <!-- Detail Modal -->
        <div wire:ignore.self id="transDetail" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-2xl p-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow min-h-[450px]">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t">
                        <div class="flex flex-row items-center space-x-4">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Transaction Detail {{ $transId }}
                            </h3>
                        </div>
                        <button wire:click.prevent="close()" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-toggle="transDetail">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    @if ($show)
                        <!-- Modal body -->
                        <div wire:loading.remove class="p-6 space-y-3">
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Date</h4>
                                <p class="text-gray-600">{{ $trans->created_at }}
                                </p>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Status</h4>
                                <div>
                                    @if ($trans->status->status == 'Cancelled')
                                        <span
                                            class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $trans->status->status }}</span>
                                    @elseif($trans->status->status == 'On Going')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $trans->status->status }}</span>
                                    @else
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">{{ $trans->status->status }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Nurse</h4>
                                <div class="flex items-center"><img class="w-8 h-8 mr-2 rounded-full"
                                        src="/assets/placeholder_man.jpeg" alt="user photo">
                                    <span class="text-gray-600">{{ $trans->nurse->name }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">City</h4>
                                <div class="flex items-center">
                                    <span class="text-gray-600">{{ $trans->city->name }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Province</h4>
                                <div class="flex items-center">
                                    <span class="text-gray-600">{{ $trans->city->province->name }}</span>
                                </div>
                            </div>

                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Address</h4>
                                <p class="text-gray-600">{{ $trans->address }}</p>
                            </div>

                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Date</h4>
                                <p class="text-gray-600">{{ $trans->start_date }} -
                                    {{ $trans->end_date }}
                                </p>
                            </div>

                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Payment Method</h4>
                                <p class="text-gray-600">{{ $trans->payment_type->type }}</p>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Price</h4>
                                <p class="text-gray-600">Rp. {{ $trans->total_price }}</p>
                            </div>
                        </div>
                        {{-- <div wire:loading class="p-6 space-y-3">
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Date</h4>
                                <p class="text-gray-600">Loading...
                                </p>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Status</h4>
                                <p class="text-gray-600">Loading...
                                </p>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Nurse</h4>
                                <p class="text-gray-600">Loading...
                                </p>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">City</h4>
                                <div class="flex items-center">
                                    <p class="text-gray-600">Loading...
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Province</h4>
                                <p class="text-gray-600">Loading...
                                </p>
                            </div>

                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Address</h4>
                                <p class="text-gray-600">Loading...
                                </p>
                            </div>

                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Payment Method</h4>
                                <p class="text-gray-600">Loading...
                                </p>
                            </div>
                            <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                                <h4 class="font-medium w-36">Price</h4>
                                <p class="text-gray-600">Loading...
                                </p>
                            </div>
                        </div> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
