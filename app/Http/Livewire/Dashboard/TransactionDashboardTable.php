<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Status;
use App\Models\Transaction;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class TransactionDashboardTable extends Component {
    use WithPagination;
    use TraitsWithSorting;
    use Actions;

    public $status = '';

    public function delete($transId) {
        Transaction::destroy($transId);
        session()->flash('success', 'Transaction no ' . $transId . ' has successfully been deleted');
        return redirect()->to('/dashboard/transactions');
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
                ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status', 'nurses.price as price')
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage)
                : DB::table('transactions')
                ->join('users', 'transactions.user_id', '=', 'users.id')
                ->join('nurses', 'transactions.nurse_id', '=', 'nurses.id')
                ->join('statuses', 'transactions.status_id', '=', 'statuses.id')
                ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status', 'nurses.price as price')
                ->where('transactions.id', 'like', '%' . $this->search . '%')
                ->orWhere('users.name', 'like', '%' . $this->search . '%')
                ->orWhere('nurses.name', 'like', '%' . $this->search . '%')
                ->orWhere('nurses.price', 'like', '%' . $this->search . '%')
                ->orWhere('start_date', 'like', '%' . $this->search . '%')
                ->orWhere('end_date', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage);
        } else {
            $transactions = empty($this->search) ? DB::table('transactions')
                ->join('users', 'transactions.user_id', '=', 'users.id')
                ->join('nurses', 'transactions.nurse_id', '=', 'nurses.id')
                ->join('statuses', 'transactions.status_id', '=', 'statuses.id')
                ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status', 'nurses.price as price')
                ->where('status_id', '=', $this->status)
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage)
                : DB::table('transactions')
                ->join('users', 'transactions.user_id', '=', 'users.id')
                ->join('nurses', 'transactions.nurse_id', '=', 'nurses.id')
                ->join('statuses', 'transactions.status_id', '=', 'statuses.id')
                ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status', 'nurses.price as price')
                ->where('status_id', '=', $this->status)
                ->where(function ($query) {
                    $query->where('transactions.id', 'like', '%' . $this->search . '%')
                        ->orWhere('users.name', 'like', '%' . $this->search . '%')
                        ->orWhere('nurses.name', 'like', '%' . $this->search . '%')
                        ->orWhere('nurses.price', 'like', '%' . $this->search . '%')
                        ->orWhere('start_date', 'like', '%' . $this->search . '%')
                        ->orWhere('end_date', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage);
        }


        return view('livewire.dashboard.transaction-dashboard-table', [
            'transactions' => $transactions,
            'statuses' => Status::get()
        ]);
    }
}
