<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Nurse;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;

class UserTransactionDashboardTable extends Component {
    use WithPagination;
    use TraitsWithSorting;
    use Actions;

    public $status = '';

    public $user;

    public function updating() {
        $this->resetPage();
    }

    public function delete($transId) {
        Transaction::destroy($transId);
        session()->flash('success', 'Transaction no ' . $transId . ' has successfully been deleted');
        return redirect()->to('/dashboard/users/' . $this->user->id);
    }

    public function confirmEndTrans($transId) {
        $this->dialog()->confirm([
            'title'       => 'Confirmation',
            'description' => 'Are you sure you want to end this
            transaction and mark the transaction as done?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Im sure',
                'method' => 'confirmTrans',
                'params' => $transId
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmTrans($transId) {
        $transUpdated = tap(DB::table('transactions')->where('id', $transId))->update([
            'status_id' => 4
        ])->first();

        Nurse::where('id', $transUpdated->nurse_id)->update([
            'availability_id' => 3
        ]);
        session()->flash('success', 'Transaction no ' . $transId . ' has been done');
        return redirect()->to('/dashboard/users/' . $this->user->id);
    }

    public function deleteConfirm($transId) {
        $this->dialog()->confirm([
            'title'       => 'Confirmation',
            'description' => 'Are you sure you want to delete this
            transaction?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Im sure',
                'method' => 'delete',
                'params' => $transId
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function render() {
        if ($this->status == '') {
            $transactions = empty($this->search) ? DB::table('transactions')
                ->join('users', 'transactions.user_id', '=', 'users.id')
                ->join('nurses', 'transactions.nurse_id', '=', 'nurses.id')
                ->join('statuses', 'transactions.status_id', '=', 'statuses.id')
                ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status')
                ->where('user_id', $this->user->id)
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage)
                : DB::table('transactions')
                ->join('users', 'transactions.user_id', '=', 'users.id')
                ->join('nurses', 'transactions.nurse_id', '=', 'nurses.id')
                ->join('statuses', 'transactions.status_id', '=', 'statuses.id')
                ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status')
                ->where('user_id', $this->user->id)
                ->where(function ($query) {
                    $query->where('transactions.id', 'like', '%' . $this->search . '%')
                        ->orWhere('users.name', 'like', '%' . $this->search . '%')
                        ->orWhere('nurses.name', 'like', '%' . $this->search . '%')
                        ->orWhere('transactions.price', 'like', '%' . $this->search . '%')
                        ->orWhere('start_date', 'like', '%' . $this->search . '%')
                        ->orWhere('end_date', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage);
        } else {
            $transactions = empty($this->search) ? DB::table('transactions')
                ->join('users', 'transactions.user_id', '=', 'users.id')
                ->join('nurses', 'transactions.nurse_id', '=', 'nurses.id')
                ->join('statuses', 'transactions.status_id', '=', 'statuses.id')
                ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status')
                ->where('user_id', $this->user->id)
                ->Where('status_id', '=', $this->status)
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage)
                : DB::table('transactions')
                ->join('users', 'transactions.user_id', '=', 'users.id')
                ->join('nurses', 'transactions.nurse_id', '=', 'nurses.id')
                ->join('statuses', 'transactions.status_id', '=', 'statuses.id')
                ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status')
                ->where('user_id', $this->user->id)
                ->where('status_id', '=', $this->status)
                ->where(function ($query) {
                    $query->where('transactions.id', 'like', '%' . $this->search . '%')
                        ->orWhere('users.name', 'like', '%' . $this->search . '%')
                        ->orWhere('nurses.name', 'like', '%' . $this->search . '%')
                        ->orWhere('transactions.price', 'like', '%' . $this->search . '%')
                        ->orWhere('start_date', 'like', '%' . $this->search . '%')
                        ->orWhere('end_date', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage);
        }
        return view('livewire.dashboard.user-transaction-dashboard-table', [
            'transactions' => $transactions,
        ]);
    }
}
