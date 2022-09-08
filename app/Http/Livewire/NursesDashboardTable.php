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

    public $status='';

    public $gender='';
    
    public function render()
    {

        // $nurses = $this->status == '' ? Nurse::search($this->search)->orderBy($this->sort,$this->sortOrder)->with(['gender','availability'])->paginate($this->perPage): Nurse::search($this->search)->where('availability_id','=',$this->status)->orWhere('gender_id','=',$this->gender)->orderBy($this->sort,$this->sortOrder)->with(['gender','availability'])->paginate($this->perPage);

        if($this->status == '' && $this->gender == ''){
            $nurses = Nurse::search($this->search)->orderBy($this->sort,$this->sortOrder)->with(['gender','availability'])->paginate($this->perPage);
        }elseif($this->gender == ''){
            $nurses = Nurse::search($this->search)->where('availability_id','=',$this->status)->orderBy($this->sort,$this->sortOrder)->with(['gender','availability'])->paginate($this->perPage);
        }elseif($this->status == ''){
            $nurses = Nurse::search($this->search)->Where('gender_id','=',$this->gender)->orderBy($this->sort,$this->sortOrder)->with(['gender','availability'])->paginate($this->perPage);
        }else{
            $nurses = Nurse::search($this->search)->where('availability_id','=',$this->status)->where('gender_id','=',$this->gender)->orderBy($this->sort,$this->sortOrder)->with(['gender','availability'])->paginate($this->perPage);
        }

        return view('livewire.nurses-dashboard-table',[
            'nurses' => $nurses,
        ]);
    }
}
