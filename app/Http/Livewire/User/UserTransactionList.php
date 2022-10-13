<?php

namespace App\Http\Livewire\User;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserTransactionList extends Component {

    use WithPagination;

    public $transId = 0;

    public $show = false;

    public $status = '';

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
                    'transactions' => Transaction::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(4),
                    'trans' => Transaction::find($this->transId)
                ];
                $this->resetPage();
            } else {
                $data = [
                    'transactions' => Transaction::where('user_id', Auth::id())->where('status_id', '=', $this->status)->orderBy('created_at', 'desc')->paginate(4),
                    'trans' => Transaction::find($this->transId)
                ];
                $this->resetPage();
            }
        } else {
            if ($this->status == '') {
                $data = [
                    'transactions' => Transaction::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(4),
                ];
                $this->resetPage();
            } else {
                $data = [
                    'transactions' => Transaction::where('user_id', Auth::id())->where('status_id', '=', $this->status)->orderBy('created_at', 'desc')->paginate(4),
                ];
                $this->resetPage();
            }
        }

        return view('livewire.user.user-transaction-list', $data);
    }
}
