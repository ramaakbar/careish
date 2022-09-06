<?php

namespace App\Http\Livewire;

use App\Models\Nurse;
use Livewire\Component;
use Livewire\WithPagination;

class NursesDashboardTable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $sort = 'id';
    public $sortOrder = 'asc';

    public function SetClicked($head)
    {
        if($head == $this->sort){
            $this->sortOrder == 'asc' ? $this->sortOrder = 'desc' : $this->sortOrder = 'asc';
        }else{
            $this->sortOrder= 'asc';
        }
        $this->sort = $head;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.nurses-dashboard-table',[
            'nurses' => Nurse::search($this->search)->orderBy($this->sort,$this->sortOrder)->with(['gender','availability'])->paginate($this->perPage),
        ]);
    }
}
