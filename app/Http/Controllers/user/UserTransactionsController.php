<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\PaymentType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function pay(Nurse $nurse, Request $request) {
        $validated = $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'payment_method' => ['required'],
            'province_id' => ['required'],
            'city_id' => ['required']
        ]);
        /*
            'user_id',
            'nurse_id',
            'status_id',
            'city_id',
            'duration_id',
            'payment_type_id',
            'start_date',
            'end_date',
            'address',
        */
        // dd($request->start_date);
        $statusId = DB::table('statuses')->select('id')->where('status', '=', 'Waiting')->first()->id;
        // dd("tes");
        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'nurse_id' => $nurse->id,
            'status_id' => $statusId,
            'city_id' => $validated['city_id'],
            'payment_type_id' => $validated['payment_method'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'address' => $validated['address'],
        ]);

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');

        return redirect('/trans/confirmation/' . $transaction->id);
    }

    public function transConfirm(Transaction $transaction) {
        return view('nurseTransactionConfirmation', [
            'transaction' => $transaction,
        ]);
    }
}
