<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use App\Traits\WithSorting as TraitsWithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class UsersDashboardTable extends Component
{
    use WithPagination;

    use TraitsWithSorting;

    public $deleteId = '';

    public function getDeleteId($id) {
        $this->deleteId = $id;
    }

    public function delete() {
        User::destroy($this->deleteId);
        session()->flash('success', 'User no ' .$this->deleteId. ' has successfully been deleted');
        return redirect()->to('/dashboard/users');
    }
    
    public function render()
    {
        return view('livewire.dashboard.users-dashboard-table',[
            'users' => User::search($this->search)->orderBy($this->sort,$this->sortOrder)->paginate($this->perPage),
        ]);
    }
}
