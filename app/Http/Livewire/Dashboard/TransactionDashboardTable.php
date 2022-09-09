<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Transaction;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionDashboardTable extends Component
{
    use WithPagination;
    use TraitsWithSorting;

    public $deleteId = '';

    public function getDeleteId($id) {
        $this->deleteId = $id;
    }

    public function delete() {
        Transaction::destroy($this->deleteId);
        session()->flash('alert', 'Transaction no '. $this->deleteId. ' has successfully been deleted');
        return redirect()->to('/dashboard/transactions');
    }

    public function render()
    {
        $transactions = empty($this->search) ? DB::table('transactions')
        ->join('users','transactions.user_id','=','users.id')
        ->join('nurses','transactions.nurse_id','=','nurses.id')
        ->join('statuses','transactions.status_id','=','statuses.id')
        ->select('transactions.*','users.name as user','nurses.name as nurse','statuses.status as status')
        ->orderBy($this->sort,$this->sortOrder)
        ->paginate($this->perPage) 
        : DB::table('transactions')
        ->join('users','transactions.user_id','=','users.id')
        ->join('nurses','transactions.nurse_id','=','nurses.id')
        ->join('statuses','transactions.status_id','=','statuses.id')
        ->select('transactions.*','users.name as user','nurses.name as nurse','statuses.status as status')
        ->where('transactions.id','like','%'.$this->search.'%')
        ->orWhere('users.name','like','%'.$this->search.'%')
        ->orWhere('nurses.name','like','%'.$this->search.'%')
        ->orWhere('total_price','like','%'.$this->search.'%')
        ->orWhere('start_date','like','%'.$this->search.'%')
        ->orWhere('end_date','like','%'.$this->search.'%')
        ->orderBy($this->sort,$this->sortOrder)
        ->paginate($this->perPage);

        return view('livewire.dashboard.transaction-dashboard-table',[
            'transactions' => $transactions
        ]);
    }
}
