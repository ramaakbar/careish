<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use App\Traits\WithSorting as TraitsWithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class UsersDashboardTable extends Component {
    use WithPagination;

    use TraitsWithSorting;

    use Actions;

    public function delete($userId) {
        User::destroy($userId);
        session()->flash('success', 'User no ' . $userId . ' has successfully been deleted');
        return redirect()->to('/dashboard/users');
    }

    public function deleteConfirm($userId) {
        $this->dialog()->confirm([
            'title'       => 'Confirmation',
            'description' => 'Are you sure you want to delete this
            user?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Im sure',
                'method' => 'delete',
                'params' => $userId
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function render() {
        return view('livewire.dashboard.users-dashboard-table', [
            'users' => User::search($this->search)->orderBy($this->sort, $this->sortOrder)->paginate($this->perPage),
        ]);
    }
}
