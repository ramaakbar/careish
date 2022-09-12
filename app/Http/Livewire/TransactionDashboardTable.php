<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionDashboardTable extends Component
{
    use WithPagination;
    use TraitsWithSorting;

    public $status='';

    public function render()
    {
        if($this->status == ''){
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
        }else{
            $transactions = empty($this->search) ? DB::table('transactions')
            ->join('users','transactions.user_id','=','users.id')
            ->join('nurses','transactions.nurse_id','=','nurses.id')
            ->join('statuses','transactions.status_id','=','statuses.id')
            ->select('transactions.*','users.name as user','nurses.name as nurse','statuses.status as status')
            ->where('status_id','=',$this->status)
            ->orderBy($this->sort,$this->sortOrder)
            ->paginate($this->perPage) 
            : DB::table('transactions')
            ->join('users','transactions.user_id','=','users.id')
            ->join('nurses','transactions.nurse_id','=','nurses.id')
            ->join('statuses','transactions.status_id','=','statuses.id')
            ->select('transactions.*','users.name as user','nurses.name as nurse','statuses.status as status')
            ->where('status_id','=',$this->status)
            ->where('transactions.id','like','%'.$this->search.'%')
            ->orWhere('users.name','like','%'.$this->search.'%')
            ->orWhere('nurses.name','like','%'.$this->search.'%')
            ->orWhere('total_price','like','%'.$this->search.'%')
            ->orWhere('start_date','like','%'.$this->search.'%')
            ->orWhere('end_date','like','%'.$this->search.'%')
            ->orderBy($this->sort,$this->sortOrder)
            ->paginate($this->perPage);
        }
        

        return view('livewire.transaction-dashboard-table',[
            'transactions' => $transactions
        ]);
    }
}
