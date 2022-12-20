<?php

namespace App\Http\Livewire\Component;

use App\Models\Nurse;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class DeleteDashboardDetail extends Component {
    use Actions;

    public $user;
    public $nurse;
    public $transaction;

    public function delete() {
        if ($this->user) {
            User::destroy($this->user->id);
            session()->flash('success', 'User no ' . $this->user->id . ' has successfully been deleted');
            return redirect()->to('/dashboard/users');
        } elseif ($this->nurse) {
            Nurse::destroy($this->nurse->id);
            session()->flash('success', 'Nurse no ' . $this->nurse->id . ' has successfully been deleted');
            return redirect()->to('/dashboard/nurses');
        } else {
            Transaction::destroy($this->transaction->id);
            session()->flash('success', 'Transaction no ' . $this->transaction->id . ' has successfully been deleted');
            return redirect()->to('/dashboard/transactions');
        }
    }

    public function deleteConfirm() {
        $this->dialog()->confirm([
            'title'       => 'Confirmation',
            'description' => 'Are you sure you want to delete this
            user?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Im sure',
                'method' => 'delete',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function render() {
        return view('livewire.component.delete-dashboard-detail');
    }
}
