<?php

namespace App\Http\Livewire\Component;

use App\Models\Nurse;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class EndTransactionBtn extends Component {
    use Actions;

    public $transaction;

    public function confirmEndTrans() {
        $this->dialog()->confirm([
            'title'       => 'Confirmation',
            'description' => 'Are you sure you want to end this
            transaction and mark the transaction as done?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Im sure',
                'method' => 'confirmTrans',
                'params' => $this->transaction->id
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmTrans() {
        $transUpdated = tap(DB::table('transactions')->where('id', $this->transaction->id))->update([
            'status_id' => 4
        ])->first();

        Nurse::where('id', $this->transaction->nurse_id)->update([
            'availability_id' => 3
        ]);
        session()->flash('success', 'Transaction no ' . $this->transaction->id . ' has been done');
        return redirect()->to('/dashboard/transactions/' . $this->transaction->id);
    }

    public function render() {
        return view('livewire.component.end-transaction-btn');
    }
}
