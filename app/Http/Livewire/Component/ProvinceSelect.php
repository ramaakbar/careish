<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class ProvinceSelect extends Component
{

    public $value = 3;

    public function render()
    {
        return view('livewire.component.province-select');
    }
}
