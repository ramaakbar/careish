<?php

namespace App\Http\Livewire\User;

use App\Models\Nurse;
use App\Models\Review;
use App\Models\Status;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class UserTransactionList extends Component {

    use WithPagination;

    use Actions;

    public $transId = 0;

    public $show;

    public $trans;

    public $review = '';

    public $rating;

    public $status = '';

    protected $queryString = [
        'status',
    ];

    public function getTransId($id) {
        $this->transId = $id;
        $this->trans = Transaction::find($id);
        $this->show = true;
    }

    protected $rules = [
        'rating' => 'required',
        'review' => 'required|min:5|max:210',
    ];

    public function submit() {
        $this->validate();

        Review::create([
            'user_id' => Auth::id(),
            'transaction_id' => $this->transId,
            'rating' => $this->rating,
            'review' => $this->review
        ]);

        $this->reset();
        $this->resetErrorBag();
        return redirect()->to('/user/transaction-list')->with('success', 'Successfully create review for nurse');
    }


    public function render() {
        if ($this->show) {
            if ($this->status == '') {
                $data = [
                    'transactions' => Transaction::with(['nurse', 'status'])->where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(4),
                    'statuses' => Status::get(),

                ];
            } else {
                $data = [
                    'transactions' => Transaction::with(['nurse', 'status'])->where('user_id', Auth::id())->where('status_id', '=', $this->status)->orderBy('created_at', 'desc')->paginate(4),
                    'statuses' => Status::get(),
                ];
            }
        } else {
            if ($this->status == '') {
                $data = [
                    'transactions' => Transaction::with(['nurse', 'status'])->where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(4),
                    'statuses' => Status::get(),
                ];
            } else {
                $data = [
                    'transactions' => Transaction::with(['nurse', 'status'])->where('user_id', Auth::id())->where('status_id', '=', $this->status)->orderBy('created_at', 'desc')->paginate(4),
                    'statuses' => Status::get(),
                ];
            }
        }

        return view('livewire.user.user-transaction-list', $data);
    }
}
