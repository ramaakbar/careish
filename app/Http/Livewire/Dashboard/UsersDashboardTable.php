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
    
    public function render()
    {
        return view('livewire.dashboard.users-dashboard-table',[
            'users' => User::search($this->search)->orderBy($this->sort,$this->sortOrder)->paginate($this->perPage),
        ]);
    }
}
