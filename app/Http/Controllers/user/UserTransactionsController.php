<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\PaymentType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserTransactionsController extends Controller {
    public function index() {
        return view('user.transactions');
    }

    public function doTrans($id) {
        $nurse = Nurse::find($id);
        $method = PaymentType::get();
        return view('nurseTransaction', [
            'nurse' => $nurse,
            'paymentMethod' => $method
        ]);
    }

    public function pay(Request $request) {
        $validated = $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'payment_method' => ['required']
        ]);
        dd('tes');
        $transaction = new Transaction();
        $transaction->name;

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        return redirect()->action([$this->class, 'transConfirm'], ['transaction' => $transaction]);
    }
}
