<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Transaction;
use Livewire\Component;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TransactionConfirmationDashboardTable extends Component {
    use WithPagination;
    use TraitsWithSorting;

    public $status = '2';

    public $cancelId = '';

    public function boot() {
        $this->sort = 'created_at';
        $this->sortOrder = 'desc';
    }

    public function accept($id) {
        Transaction::where('id', $id)->update([
            'status_id' => 3
        ]);
        session()->flash('success', 'Transaction no ' . $id . ' has successfully been accepted');
        return redirect()->to('/dashboard/confirmations');
    }

    public function getCancelId($id) {
        $this->cancelId = $id;
    }

    public function cancel() {
        Transaction::where('id', $this->cancelId)->update([
            'status_id' => 1
        ]);
        session()->flash('success', 'Transaction no ' . $this->cancelId . ' has successfully been cancelled');
        return redirect()->to('/dashboard/confirmations');
    }
    public function render() {

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

        return view('livewire.dashboard.transaction-confirmation-dashboard-table', [
            'transactions' => $transactions
        ]);
    }
}
