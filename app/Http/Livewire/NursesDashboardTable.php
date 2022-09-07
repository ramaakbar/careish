<?php

namespace App\Http\Livewire;

use App\Models\Nurse;
use App\Traits\WithSorting as TraitsWithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class NursesDashboardTable extends Component
{
    use WithPagination;

    use TraitsWithSorting;
    
    public function render()
    {
        return view('livewire.nurses-dashboard-table',[
            'nurses' => Nurse::search($this->search)->orderBy($this->sort,$this->sortOrder)->with(['gender','availability'])->paginate($this->perPage),
        ]);
    }
}
