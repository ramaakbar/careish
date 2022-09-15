<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;

class UserTransactionDashboardTable extends Component
{
    use WithPagination;
    use TraitsWithSorting;

    public $status='';
    
    public $deleteId = '';

    public $user;

    public function getDeleteId($id) {
        $this->deleteId = $id;
    }

    public function delete() {
        Transaction::destroy($this->deleteId);
        session()->flash('success', 'Transaction no '. $this->deleteId. ' has successfully been deleted');
        return redirect()->to('/dashboard/transactions');
    }
    
    public function render()
    {
        if($this->status == ''){
            $transactions = empty($this->search) ? DB::table('transactions')
            ->join('users','transactions.user_id','=','users.id')
            ->join('nurses','transactions.nurse_id','=','nurses.id')
            ->join('statuses','transactions.status_id','=','statuses.id')
            ->select('transactions.*','users.name as user','nurses.name as nurse','statuses.status as status')
            ->where('user_id',$this->user->id)
            ->orderBy($this->sort,$this->sortOrder)
            ->paginate($this->perPage) 
            : DB::table('transactions')
            ->join('users','transactions.user_id','=','users.id')
            ->join('nurses','transactions.nurse_id','=','nurses.id')
            ->join('statuses','transactions.status_id','=','statuses.id')
            ->select('transactions.*','users.name as user','nurses.name as nurse','statuses.status as status')
            ->where('user_id',$this->user->id)
            ->where(function($query){
                $query->where('transactions.id','like','%'.$this->search.'%')
                ->orWhere('users.name','like','%'.$this->search.'%')
                ->orWhere('nurses.name','like','%'.$this->search.'%')
                ->orWhere('total_price','like','%'.$this->search.'%')
                ->orWhere('start_date','like','%'.$this->search.'%')
                ->orWhere('end_date','like','%'.$this->search.'%');
            })
            ->orderBy($this->sort,$this->sortOrder)
            ->paginate($this->perPage);
        }else{
            $transactions = empty($this->search) ? DB::table('transactions')
            ->join('users','transactions.user_id','=','users.id')
            ->join('nurses','transactions.nurse_id','=','nurses.id')
            ->join('statuses','transactions.status_id','=','statuses.id')
            ->select('transactions.*','users.name as user','nurses.name as nurse','statuses.status as status')
            ->where('user_id',$this->user->id)
            ->Where('status_id','=',$this->status)
            ->orderBy($this->sort,$this->sortOrder)
            ->paginate($this->perPage) 
            : DB::table('transactions')
            ->join('users','transactions.user_id','=','users.id')
            ->join('nurses','transactions.nurse_id','=','nurses.id')
            ->join('statuses','transactions.status_id','=','statuses.id')
            ->select('transactions.*','users.name as user','nurses.name as nurse','statuses.status as status')
            ->where('user_id',$this->user->id)
            ->where('status_id','=',$this->status)
            ->where(function($query){
                $query->where('transactions.id','like','%'.$this->search.'%')
                ->orWhere('users.name','like','%'.$this->search.'%')
                ->orWhere('nurses.name','like','%'.$this->search.'%')
                ->orWhere('total_price','like','%'.$this->search.'%')
                ->orWhere('start_date','like','%'.$this->search.'%')
                ->orWhere('end_date','like','%'.$this->search.'%');
            })
            ->orderBy($this->sort,$this->sortOrder)
            ->paginate($this->perPage);
        }
        return view('livewire.dashboard.user-transaction-dashboard-table',[
            'transactions' => $transactions,
        ]);
    }
}