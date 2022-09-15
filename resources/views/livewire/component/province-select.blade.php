<div>
    <x-select wire:model.defer="province_id" placeholder="Select province" :async-data="route('provinces')"
        option-label="name" option-value="id" value="{{ $value }}" class="test"/>
</div>
