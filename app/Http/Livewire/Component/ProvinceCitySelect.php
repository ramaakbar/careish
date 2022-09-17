<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class ProvinceCitySelect extends Component
{
    public $province_id;
    public $city_id;

    public function render()
    {
        return view('livewire.component.province-city-select');
    }
}
