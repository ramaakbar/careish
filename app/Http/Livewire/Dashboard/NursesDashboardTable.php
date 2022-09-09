<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Nurse;
use App\Traits\WithSorting as TraitsWithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class NursesDashboardTable extends Component
{
    use WithPagination;

    use TraitsWithSorting;

    public $deleteId = '';

    public function getDeleteId($id) {
        $this->deleteId = $id;
    }

    public function delete() {
        Nurse::destroy($this->deleteId);
        session()->flash('success', 'Nurse no ' .$this->deleteId. ' has successfully been deleted');
        return redirect()->to('/dashboard/nurses');
    }
    
    public function render()
    {
        return view('livewire.dashboard.nurses-dashboard-table',[
            'nurses' => Nurse::search($this->search)->orderBy($this->sort,$this->sortOrder)->with(['gender','availability'])->paginate($this->perPage),
        ]);
    }
}
