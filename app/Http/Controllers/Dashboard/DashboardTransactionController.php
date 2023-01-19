<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PaymentType;
use App\Models\Status;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardTransactionController extends Controller {
    public function transactions() {
        return view('dashboard.transactions');
    }

    public function detail(Transaction $transaction) {
        return view('dashboard.transaction-detail', [
            'transaction' => $transaction,
            'payment_types' => PaymentType::all(),
            'statuses' => Status::all(),
        ]);
    }

    public function update(Request $request, Transaction $transaction) {
        $validated = $request->validate([
            'start_date' => ['required'],
            'end_date' => ['required'],
            'payment_type_id' => ['required'],
            // 'total_price' => ['required','gte:1'],
            'status_id' => ['required'],
            'address' => ['required', 'min:4', 'max:50'],
            'city_id' => ['required'],
        ]);

        Transaction::where('id', $transaction->id)->update($validated);
        return back()->with('success', 'Transaction has been updated');
    }

    public function delete(Request $request, Transaction $transaction) {
        Transaction::destroy($transaction->id);
        return redirect('/dashboard/transactions')->with('success', 'Transaction ' . 'T' . $transaction->id . ' has been deleted');
    }
}
