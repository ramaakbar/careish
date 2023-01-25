<div class="grid grid-cols-4 w-full gap-5 mb-5">
    <div class="col-span-4 md:col-span-2">
        <label for="province_id" class="block mb-2 text-sm font-medium text-gray-900 ">Province</label>
        <x-select wire:model="province_id" placeholder="Select province" :async-data="route('provinces')" option-label="name"
            option-value="id" value="{{ $province_id }}" />
    </div>
    <div class="col-span-4 md:col-span-2">
        <label for="city_id" class="block mb-2 text-sm font-medium text-gray-900 ">City</label>
        <x-select wire:model="city_id" placeholder="Select city" :async-data="route('cities', ['provinces_id' => $province_id])" option-label="name" option-value="id"
            value="{{ $city_id }}" />
    </div>

</div>
