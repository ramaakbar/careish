<div>
    <div class="flex items-center justify-between mb-5">
        <h1 class="text-2xl font-bold">Transaction List</h1>
        <div class="flex items-center space-x-3">
            <label for="" class="block text-sm font-medium text-gray-900">Status</label>
            <select wire:model="status" id="gender_id" name="gender_id"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-32">
                <option value="" selected>All</option>
                @foreach ($statuses as $status)
                    <option value={{ $status->id }}>{{ $status->status }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="space-y-5">
        @forelse ($transactions as $transaction)
            <div class="w-full p-3 bg-white border rounded">
                <div class="flex flex-wrap items-center mb-5 space-x-5">
                    <h3 class="text-xl font-semibold">T{{ $transaction->id }}</h3>
                    <p class="text-gray-600">{{ Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}
                    </p>
                    @if ($transaction->status->status == 'Cancelled')
                        <span
                            class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Cancelled</span>
                    @elseif($transaction->status->status == 'Waiting')
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Waiting</span>
                    @elseif($transaction->status->status == 'On Going')
                        <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">On
                            Going</span>
                    @else
                        <span
                            class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Done</span>
                    @endif
                </div>
                <div class="space-y-3">
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="w-24 font-medium">Nurse</h4>
                        <div class="flex items-center"><img class="w-8 h-8 mr-2 rounded-full"
                                src="{{ asset('/storage/' . $transaction->nurse->picture) }}" alt="user photo">
                            <span class="text-gray-600">{{ $transaction->nurse->name }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="w-24 font-medium">Date</h4>
                        <p class="text-gray-600">{{ Carbon\Carbon::parse($transaction->start_date)->format('d M Y') }} -
                            {{ Carbon\Carbon::parse($transaction->end_date)->format('d M Y') }}
                        </p>
                    </div>
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="w-24 font-medium">Address</h4>
                        <p class="text-gray-600">{{ $transaction->address }}</p>
                    </div>
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="w-24 font-medium">Price</h4>
                        <p class="text-gray-600">Rp{{ number_format($transaction->nurse->price, 2, ',', '.') }}</p>
                    </div>
                    <div class="flex justify-end">
                        <button wire:click="getTransId({{ $transaction->id }})" onclick="$openModal('detailModal')"
                            type="button"
                            class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                            See Detail
                        </button>
                        @if ($transaction->status->status == 'On Going')
                            <button wire:click="confirmEndTrans({{ $transaction->id }})"
                                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">End
                                Transaction</button>
                        @endif

                        @if ($transaction->status->status == 'Done' && !$transaction->review)
                            <button wire:click="getTransId({{ $transaction->id }})" onclick="$openModal('reviewModal')"
                                class="text-white bg-primary-500 hover:bg-primary-600 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Create
                                review</button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="grid items-center justify-center mt-10 space-y-5">
                <div class="w-56">
                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 485.83373 483.5"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path
                            d="M677.54186,336.34717H597.80041a11.47812,11.47812,0,0,1-9.06567-4.39356h0a11.62154,11.62154,0,0,1-2.17652-9.96777,201.63052,201.63052,0,0,0-.00049-93.647,11.62425,11.62425,0,0,1,2.17676-9.96729,11.47753,11.47753,0,0,1,9.06592-4.39355h79.74145a11.6235,11.6235,0,0,1,11.439,9.75537,337.96108,337.96108,0,0,1,0,102.8584A11.6235,11.6235,0,0,1,677.54186,336.34717Z"
                            transform="translate(-357.08314 -208.25)" fill="#e6e6e6" />
                        <path
                            d="M597.80041,219.978a5.51264,5.51264,0,0,0-4.35449,2.1084,5.65943,5.65943,0,0,0-1.05371,4.85351,207.656,207.656,0,0,1,.00048,96.44531,5.65638,5.65638,0,0,0,1.053,4.85254l.00049.00049a5.5112,5.5112,0,0,0,4.35425,2.10889h79.74145a5.58248,5.58248,0,0,0,5.50879-4.667,331.9854,331.9854,0,0,0,0-101.03516,5.58248,5.58248,0,0,0-5.50879-4.667Z"
                            transform="translate(-357.08314 -208.25)" fill="#fff" />
                        <path
                            d="M660.14054,248.82872h-41.845a6.00633,6.00633,0,0,1-5.99977-5.99977v-2.34463a6.00633,6.00633,0,0,1,5.99977-5.99977h41.845a6.00633,6.00633,0,0,1,5.99976,5.99977V242.829A6.00632,6.00632,0,0,1,660.14054,248.82872Z"
                            transform="translate(-357.08314 -208.25)" fill="#e6e6e6" />
                        <path
                            d="M660.14054,278.4545h-41.845a6.00632,6.00632,0,0,1-5.99977-5.99976V270.1101a6.00632,6.00632,0,0,1,5.99977-5.99976h41.845a6.00632,6.00632,0,0,1,5.99976,5.99976v2.34464A6.00632,6.00632,0,0,1,660.14054,278.4545Z"
                            transform="translate(-357.08314 -208.25)" fill="#e6e6e6" />
                        <path
                            d="M660.14054,308.08029h-41.845a6.00633,6.00633,0,0,1-5.99977-5.99977v-2.34463a6.00632,6.00632,0,0,1,5.99977-5.99976h41.845a6.00632,6.00632,0,0,1,5.99976,5.99976v2.34463A6.00632,6.00632,0,0,1,660.14054,308.08029Z"
                            transform="translate(-357.08314 -208.25)" fill="#e6e6e6" />
                        <path
                            d="M827.54186,412.34717H747.80041a11.47812,11.47812,0,0,1-9.06567-4.39356h0a11.62154,11.62154,0,0,1-2.17652-9.96777,201.63052,201.63052,0,0,0-.00049-93.647,11.62425,11.62425,0,0,1,2.17676-9.96729,11.47753,11.47753,0,0,1,9.06592-4.39355h79.74145a11.6235,11.6235,0,0,1,11.439,9.75537,337.96108,337.96108,0,0,1,0,102.8584A11.6235,11.6235,0,0,1,827.54186,412.34717Z"
                            transform="translate(-357.08314 -208.25)" fill="#e6e6e6" />
                        <path
                            d="M747.80041,295.978a5.51264,5.51264,0,0,0-4.35449,2.1084,5.65943,5.65943,0,0,0-1.05371,4.85351,207.656,207.656,0,0,1,.00048,96.44531,5.65638,5.65638,0,0,0,1.053,4.85254l.00049.00049a5.5112,5.5112,0,0,0,4.35425,2.10889h79.74145a5.58248,5.58248,0,0,0,5.50879-4.667,331.9854,331.9854,0,0,0,0-101.03516,5.58248,5.58248,0,0,0-5.50879-4.667Z"
                            transform="translate(-357.08314 -208.25)" fill="#fff" />
                        <path
                            d="M668.54186,498.84717H588.80041a11.97546,11.97546,0,0,1-9.45825-4.584,12.1192,12.1192,0,0,1-2.27-10.394,201.13112,201.13112,0,0,0-.00049-93.41357,12.12077,12.12077,0,0,1,2.27026-10.39356,11.97561,11.97561,0,0,1,9.4585-4.584h79.74145a12.12667,12.12667,0,0,1,11.93311,10.1792,338.45925,338.45925,0,0,1,0,103.01074A12.12668,12.12668,0,0,1,668.54186,498.84717Z"
                            transform="translate(-357.08314 -208.25)" fill="#f2f2f2" />
                        <path
                            d="M810.14054,339.82872h-41.845a6.00633,6.00633,0,0,1-5.99977-5.99977v-2.34463a6.00633,6.00633,0,0,1,5.99977-5.99977h41.845a6.00633,6.00633,0,0,1,5.99976,5.99977V333.829A6.00632,6.00632,0,0,1,810.14054,339.82872Z"
                            transform="translate(-357.08314 -208.25)" fill="#e6e6e6" />
                        <path
                            d="M810.14054,369.4545h-41.845a6.00632,6.00632,0,0,1-5.99977-5.99976V361.1101a6.00632,6.00632,0,0,1,5.99977-5.99976h41.845a6.00632,6.00632,0,0,1,5.99976,5.99976v2.34464A6.00632,6.00632,0,0,1,810.14054,369.4545Z"
                            transform="translate(-357.08314 -208.25)" fill="#e6e6e6" />
                        <circle cx="271.81102" cy="228.5" r="23" fill="#fff" />
                        <path
                            d="M639.89416,433.75h-8v-8a3,3,0,0,0-6,0v8h-8a3,3,0,0,0,0,6h8v8a3,3,0,0,0,6,0v-8h8a3,3,0,0,0,0-6Z"
                            transform="translate(-357.08314 -208.25)" fill="#e6e6e6" />
                        <path
                            d="M657.89416,225.25h-42a4.50508,4.50508,0,0,1-4.5-4.5v-8a4.50508,4.50508,0,0,1,4.5-4.5h42a4.50508,4.50508,0,0,1,4.5,4.5v8A4.50508,4.50508,0,0,1,657.89416,225.25Z"
                            transform="translate(-357.08314 -208.25)" fill="#ccc" />
                        <path
                            d="M809.89416,302.25h-42a4.50508,4.50508,0,0,1-4.5-4.5v-8a4.50508,4.50508,0,0,1,4.5-4.5h42a4.50508,4.50508,0,0,1,4.5,4.5v8A4.50508,4.50508,0,0,1,809.89416,302.25Z"
                            transform="translate(-357.08314 -208.25)" fill="#ccc" />
                        <polygon points="88.596 471.061 100.856 471.061 104.689 423.773 88.594 423.773 88.596 471.061"
                            fill="#ffb8b8" />
                        <path
                            d="M442.55234,675.30845l24.1438-.001h.001a15.38605,15.38605,0,0,1,15.38647,15.38623v.5l-39.53051.00146Z"
                            transform="translate(-357.08314 -208.25)" fill="#2f2e41" />
                        <polygon points="22.596 471.061 34.856 471.061 40.689 423.773 22.594 423.773 22.596 471.061"
                            fill="#ffb8b8" />
                        <path
                            d="M376.55234,675.30845l24.1438-.001h.001a15.38605,15.38605,0,0,1,15.38647,15.38623v.5l-39.53051.00146Z"
                            transform="translate(-357.08314 -208.25)" fill="#2f2e41" />
                        <path
                            d="M381.85436,664.37256a4.98141,4.98141,0,0,1-3.375-1.31836h0a4.961,4.961,0,0,1-1.61572-3.53711L371.947,483.30371l69.81115,17.45215,21.53955,64.61768a70.461,70.461,0,0,1,3.54541,25.82421l-2.67456,62.63672a4.996,4.996,0,0,1-4.99438,4.75879h-11.709a5.02349,5.02349,0,0,1-4.95483-4.32959l-8.3689-69.1416a37.82338,37.82338,0,0,0-5.53173-15.16406l-16.46949-26.07617a1.00011,1.00011,0,0,0-1.83764.41015L397.378,659.38037a4.99328,4.99328,0,0,1-4.687,4.39649l-10.552.58691C382.04406,664.36914,381.94934,664.37256,381.85436,664.37256Z"
                            transform="translate(-357.08314 -208.25)" fill="#2f2e41" />
                        <circle cx="73.05767" cy="136.40609" r="24.56103" fill="#ffb8b8" />
                        <path
                            d="M441.4237,507.92236a5.07628,5.07628,0,0,1-1.25293-.15918H440.17l-69.26428-17.75976a4.9985,4.9985,0,0,1-3.66285-5.81543L383.15,398.49707a31.21377,31.21377,0,0,1,18.24975-22.53955,30.11308,30.11308,0,0,1,28.26563,2.07519c.96973.605,1.94653,1.26465,2.90259,1.96094a30.96046,30.96046,0,0,1,12.57885,24.5293l1.2649,98.32861a5.00656,5.00656,0,0,1-4.988,5.0708Z"
                            transform="translate(-357.08314 -208.25)" fill="#504be5" />
                        <path
                            d="M378.03248,508.93008a10.05576,10.05576,0,0,1,4.214-14.83233l-3.08079-35.6018,16.326,8.84848.42262,32.4515a10.11027,10.11027,0,0,1-17.8818,9.13415Z"
                            transform="translate(-357.08314 -208.25)" fill="#ffb8b8" />
                        <path
                            d="M383.86511,489.38916a5.53224,5.53224,0,0,1-1.36573-.17285,5.49559,5.49559,0,0,1-3.97192-3.98633l-8.02319-31.88379a47.37028,47.37028,0,0,1,3.76123-33.13476l16.80884-32.88184a15.54083,15.54083,0,0,1,18.8081-11.01855,15.35574,15.35574,0,0,1,9.47485,7.10058,15.56707,15.56707,0,0,1,1.65406,11.91309l-23.92749,53.50586.28418,32.03564a5.5186,5.5186,0,0,1-3.58448,5.20459l-8.00732,2.97363A5.48,5.48,0,0,1,383.86511,489.38916Z"
                            transform="translate(-357.08314 -208.25)" fill="#504be5" />
                        <path
                            d="M498.40087,495.83467a10.05578,10.05578,0,0,1-8.493-12.86954l-28.99341-20.88926,17.35654-6.60182,24.8717,20.84893a10.11027,10.11027,0,0,1-4.74186,19.51169Z"
                            transform="translate(-357.08314 -208.25)" fill="#ffb8b8" />
                        <path
                            d="M483.223,480.58057a5.52249,5.52249,0,0,1-2.46265-.58155L451.3612,465.28174a47.381,47.381,0,0,1-22.66064-24.46533L414.74328,406.626a15.54363,15.54363,0,0,1,3.91772-21.44434,15.35158,15.35158,0,0,1,11.59034-2.54346,15.56975,15.56975,0,0,1,10.08081,6.51221l24.94507,53.03955L489.743,462.87256a5.51764,5.51764,0,0,1,1.60669,6.11182l-2.96973,8.0083a5.474,5.474,0,0,1-2.00684,2.59619,5.49717,5.49717,0,0,1-3.15014.9917Z"
                            transform="translate(-357.08314 -208.25)" fill="#504be5" />
                        <path
                            d="M424.98332,369.5931c1.305.571,3.97732-9.82732,2.78025-11.90707-1.78025-3.09293-1.675-3.07072-2.85681-5.117s-1.44623-4.84712.08417-6.64761,5.072-1.56163,5.77042.69581c-.4493-4.2878,3.79189-7.73454,7.993-8.70313s8.63244-.36723,12.85668-1.22917c4.90243-1.00032,10.00316-5.10972,8.04719-10.5007a7.5931,7.5931,0,0,0-1.48106-2.43408c-2.25993-2.54094-5.42117-3.62594-8.512-4.675-6.43006-2.18246-13.036-4.39233-19.82212-4.15141A28.7977,28.7977,0,0,0,404.3967,333.533a26.15571,26.15571,0,0,0-1.08344,4.02534c-2.32924,12.52423,4.94368,24.87794,16.75623,29.64715Z"
                            transform="translate(-357.08314 -208.25)" fill="#2f2e41" />
                        <polygon points="38.9 273.343 39.457 240.414 56.9 205.343 42.9 241.343 38.9 273.343"
                            opacity="0.2" />
                        <path
                            d="M554.16035,564.23244,480.522,533.63692a11.47817,11.47817,0,0,1-6.68609-7.53565h0a11.62155,11.62155,0,0,1,1.81454-10.04,201.63062,201.63062,0,0,0,35.9304-86.47983,11.62422,11.62422,0,0,1,5.83445-8.36925,11.47751,11.47751,0,0,1,10.05779-.57884l73.63839,30.59552a11.62349,11.62349,0,0,1,6.8205,13.39769,337.96147,337.96147,0,0,1-39.46512,94.98607A11.6235,11.6235,0,0,1,554.16035,564.23244Z"
                            transform="translate(-357.08314 -208.25)" fill="#e6e6e6" />
                        <path
                            d="M525.17093,426.17415a5.51263,5.51263,0,0,0-4.83017.27629,5.65945,5.65945,0,0,0-2.83529,4.07775,207.65608,207.65608,0,0,1-37.00407,89.064,5.65636,5.65636,0,0,0-.88946,4.88515l.00027.00064a5.51116,5.51116,0,0,0,3.21185,3.61814l73.63839,30.59552a5.58247,5.58247,0,0,0,6.87782-2.19616,331.98566,331.98566,0,0,0,38.76558-93.30238,5.58248,5.58248,0,0,0-3.29652-6.42343Z"
                            transform="translate(-357.08314 -208.25)" fill="#fff" />
                        <path
                            d="M564.38028,494.28148l-38.6424-16.05527a6.00633,6.00633,0,0,1-3.23855-7.84259l.8996-2.16518a6.00632,6.00632,0,0,1,7.84258-3.23856l38.6424,16.05527a6.00634,6.00634,0,0,1,3.23855,7.84259l-.8996,2.16518A6.00632,6.00632,0,0,1,564.38028,494.28148Z"
                            transform="translate(-357.08314 -208.25)" fill="#504be5" />
                        <path
                            d="M553.01334,521.63984l-38.6424-16.05527a6.00633,6.00633,0,0,1-3.23855-7.84259l.89959-2.16518a6.00634,6.00634,0,0,1,7.84259-3.23856L558.517,508.39351a6.00633,6.00633,0,0,1,3.23856,7.84258l-.8996,2.16519A6.00632,6.00632,0,0,1,553.01334,521.63984Z"
                            transform="translate(-357.08314 -208.25)" fill="#504be5" />
                        <path
                            d="M579.86437,455.832a4.48944,4.48944,0,0,1-1.68725-.33057l-38.938-15.74267a4.50518,4.50518,0,0,1-2.48535-5.8584l2.99878-7.417a4.50027,4.50027,0,0,1,5.85864-2.48486l38.938,15.74267a4.50518,4.50518,0,0,1,2.48535,5.8584l-2.99878,7.417a4.51079,4.51079,0,0,1-4.17139,2.81543Z"
                            transform="translate(-357.08314 -208.25)" fill="#ccc" />
                        <path d="M498.08314,691.75h-140a1,1,0,1,1,0-2h140a1,1,0,0,1,0,2Z"
                            transform="translate(-357.08314 -208.25)" fill="#ccc" />
                    </svg>
                </div>
                <p class="text-gray-600">Your transaction is Empty.</p>
            </div>
        @endforelse

        @if ($transactions->count())
            <div class="p-4">
                {{ $transactions->links() }}
            </div>
        @endif

        <x-modal.card title="Create review" wire:model.defer="reviewModal" x-on:close="reset">
            @if ($show)
                <div class="px-2">
                    <form id="myForm" wire:submit.prevent="submit">
                        <div class="mb-4">
                            <div class="flex items-center"><img class="w-8 h-8 mr-2 rounded-full"
                                    src="{{ asset('/storage/' . $trans->nurse->picture) }}"
                                    alt="{{ $trans->nurse->name . ' picture' }}" alt="user photo">
                                <span class="text-gray-600">{{ $trans->nurse->name }}</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="rating"
                                class="flex items-center mb-2 text-sm font-medium text-gray-900">Rating
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 ml-1 fill-yellow-400 stroke-transparent" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg></label>
                            <select id="rating" name="rating" wire:model="rating"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Select Rating</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            @error('rating')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="review"
                                class="flex items-center mb-2 text-sm font-medium text-gray-900">Review
                            </label>
                            <x-textarea wire:model="review" placeholder="Review message here"
                                class="focus:!ring-blue-500 focus:!border-blue-500" />
                            @error('review')
                                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <button
                            class="w-full text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Create
                            Review</button>
                    </form>

                </div>
            @endif

        </x-modal.card>

        <x-modal.card title="Transaction Detail {{ $transId }}" wire:model.defer="detailModal">
            @if ($show)
                <div class="px-2 space-y-3">
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="font-medium w-36">Date</h4>
                        <p class="text-gray-600">{{ Carbon\Carbon::parse($trans->created_at)->format('d M Y H:i') }}
                        </p>
                    </div>

                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="font-medium w-36">Status</h4>
                        <div>
                            @if ($trans->status->status == 'Cancelled')
                                <span
                                    class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Cancelled</span>
                            @elseif($trans->status->status == 'Waiting')
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Waiting</span>
                            @elseif($trans->status->status == 'On Going')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">On
                                    Going</span>
                            @else
                                <span
                                    class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Done</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="font-medium w-36">Nurse</h4>
                        <div class="flex items-center"><img class="w-8 h-8 mr-2 rounded-full"
                                src="{{ asset('/storage/' . $trans->nurse->picture) }}"
                                alt="{{ $trans->nurse->name . ' picture' }}" alt="user photo">
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
                        <p class="text-gray-600">{{ Carbon\Carbon::parse($trans->start_date)->format('d M Y H:i') }} -
                            {{ Carbon\Carbon::parse($trans->end_date)->format('d M Y H:i') }}
                        </p>
                    </div>

                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="font-medium w-36">Payment Method</h4>
                        <p class="text-gray-600">{{ $trans->payment_type->type }}</p>
                    </div>
                    <div class="flex flex-col space-y-2 md:items-center sm:flex-row md:space-y-0">
                        <h4 class="font-medium w-36">Price</h4>
                        <p class="text-gray-600">Rp{{ number_format($trans->nurse->price, 2, ',', '.') }}</p>
                    </div>
                </div>
            @endif
        </x-modal.card>

    </div>
</div>
