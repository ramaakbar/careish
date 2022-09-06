<?php

namespace App\Http\Livewire;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;
use Livewire\WithPagination;

class UsersDashboardTable extends Component
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
        return view('livewire.users-dashboard-table',[
            'users' => User::search($this->search)->orderBy($this->sort,$this->sortOrder)->paginate($this->perPage),
        ]);
    }
}
