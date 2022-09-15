<div>
    <x-select wire:model.defer="city_id" placeholder="Select city" :async-data="route('cities')"
        option-label="name" option-value="id" value="{{ $value }}"/>
</div>
