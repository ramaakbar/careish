<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class CitySelect extends Component
{
    public $value;

    public function render()
    {
        return view('livewire.component.city-select');
    }
}
