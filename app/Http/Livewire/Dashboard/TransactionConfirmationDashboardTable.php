<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Nurse;
use App\Models\Transaction;
use Livewire\Component;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class TransactionConfirmationDashboardTable extends Component {
    use WithPagination;
    use TraitsWithSorting;
    use Actions;

    public $status = '2';

    public function boot() {
        $this->sort = 'created_at';
        $this->sortOrder = 'desc';
    }

    public function accept($id) {
        $transUpdated = tap(DB::table('transactions')->where('id', $id))->update([
            'status_id' => 3
        ])->first();

        Nurse::where('id', $transUpdated->nurse_id)->update([
            'availability_id' => 2
        ]);
        session()->flash('success', 'Transaction no ' . $id . ' has successfully been accepted');
        return redirect()->to('/dashboard/confirmations');
    }

    public function reject($transId) {
        Transaction::where('id', $transId)->update([
            'status_id' => 1
        ]);
        session()->flash('success', 'Transaction no ' . $transId . ' has successfully been rejected');
        return redirect()->to('/dashboard/confirmations');
    }

    public function rejectConfirmation($transId) {
        $this->dialog()->confirm([
            'title'       => 'Confirmation',
            'description' => 'Are you sure you want to reject this
            transaction?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Im sure',
                'method' => 'reject',
                'params' => $transId
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function render() {

        $transactions = empty($this->search) ? DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('nurses', 'transactions.nurse_id', '=', 'nurses.id')
            ->join('statuses', 'transactions.status_id', '=', 'statuses.id')
            ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status')
            ->where('status_id', '=', $this->status)
            ->orderBy($this->sort, $this->sortOrder)
            ->paginate($this->perPage)
            : DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('nurses', 'transactions.nurse_id', '=', 'nurses.id')
            ->join('statuses', 'transactions.status_id', '=', 'statuses.id')
            ->select('transactions.*', 'users.name as user', 'nurses.name as nurse', 'statuses.status as status')
            ->where('status_id', '=', $this->status)
            ->where(function ($query) {
                $query->where('transactions.id', 'like', '%' . $this->search . '%')
                    ->orWhere('users.name', 'like', '%' . $this->search . '%')
                    ->orWhere('nurses.name', 'like', '%' . $this->search . '%')
                    ->orWhere('price', 'like', '%' . $this->search . '%')
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
