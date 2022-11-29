<?php

namespace App\Http\Livewire\User;

use App\Models\Status;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserTransactionList extends Component {

    use WithPagination;

    public $transId = 0;

    public $show = false;

    public $status = '';

    public function confirmTrans() {
        Transaction::where('id', $this->transId)->update([
            'status_id' => 4
        ]);
        session()->flash('success', 'Transaction no ' . $this->transId . ' has been done');
        return redirect()->to('/user/transaction-list');
    }

    public function getTransId($id) {
        $this->transId = $id;
        $this->show = true;
    }

    public function close() {
        $this->show = false;
    }

    public function render() {
        if ($this->show) {
            if ($this->status == '') {
                $data = [
                    'transactions' => Transaction::with(['nurse', 'status'])->where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(4),
                    'trans' => Transaction::find($this->transId),
                    'statuses' => Status::get(),

                ];
                $this->resetPage();
            } else {
                $data = [
                    'transactions' => Transaction::with(['nurse', 'status'])->where('user_id', Auth::id())->where('status_id', '=', $this->status)->orderBy('created_at', 'desc')->paginate(4),
                    'trans' => Transaction::find($this->transId),
                    'statuses' => Status::get(),
                ];
                $this->resetPage();
            }
        } else {
            if ($this->status == '') {
                $data = [
                    'transactions' => Transaction::with(['nurse', 'status'])->where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(4),
                    'statuses' => Status::get(),
                ];
                $this->resetPage();
            } else {
                $data = [
                    'transactions' => Transaction::with(['nurse', 'status'])->where('user_id', Auth::id())->where('status_id', '=', $this->status)->orderBy('created_at', 'desc')->paginate(4),
                    'statuses' => Status::get(),
                ];
                $this->resetPage();
            }
        }

        return view('livewire.user.user-transaction-list', $data);
    }
}
