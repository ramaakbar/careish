<div class="px-5 mx-auto mt-16 scroll-m-16 max-w-7xl">
    <div class="flex justify-between">
        <div class="flex space-x-5">
            <div class="w-1/3">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                <select wire:model="gender"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 h-auto"
                    id="">
                    <option value="" selected>All</option>
                    <option value=1>Male</option>
                    <option value=2>Female</option>
                </select>
            </div>
            <div class="flex w-full gap-5 mb-5">
                <div class="w-3/6">
                    <label for="province_id" class="block mb-2 text-sm font-medium text-gray-900 ">Province</label>
                    <x-select wire:model="province_id" placeholder="Select province" :async-data="route('provinces')"
                        option-label="name" option-value="id" value="{{ $province_id }}" />
                    @error('province_id')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                snapp!</span> {{ $message }}</p>
                    @enderror
                </div>
                <div class="w-3/6">
                    <label for="city_id" class="block mb-2 text-sm font-medium text-gray-900 ">City</label>
                    <x-select wire:model="city_id" placeholder="Select city" :async-data="route('cities', ['provinces_id' => $province_id])" option-label="name"
                        option-value="id" value="{{ $city_id }}" />
                    @error('city_id')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                snapp!</span> {{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        {{-- <div class="w-1/3">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Sort By:</label>
            <select wire:model="sortBy"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                id="">
                <option value=name selected>Name</option>
                <option value=age>Age</option>
            </select>
        </div> --}}
    </div>
    @if (count($nurses) != 0)
        <div class="grid grid-cols-1 gap-8 mt-5 md:grid-cols-3">
            @foreach ($nurses as $nurse)
                <div class="overflow-hidden rounded-lg shadow-lg w-96">
                    <img class="m-0 w-96 h-80" src="{{ $nurse->picture }}" alt="">
                    <p class="mt-5 ml-5 font-bold">{{ $nurse->name }}</p>
                    <div class="mt-2 mb-5 ml-5 mr-5">
                        <div class="flex justify-between">
                            <p>{{ $nurse->gender }}</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 mr-1 fill-yellow-400 stroke-transparent" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                <p>{{ number_format($nurse->rating, 1, '.', ',') }}/5.0</p>
                            </div>
                        </div>
                        <p>{{ $nurse->age }} Tahun</p>
                        <p>{{ $nurse->cityName }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8 mb-24">
            {{ $nurses->links() }}
        </div>
    @else
        <div class="text-[#848484] h-[51vh] flex items-center justify-center">
            There are no nurses available...
        </div>
    @endif
</div>
