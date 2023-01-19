<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        return view('dashboard.index', [
            'nurses' => Nurse::with(['availability'])->where('availability_id', '=', '3')->limit(7)->get(),
            'transactions' => Transaction::with(['status'])->limit(7)->orderByDesc('created_at')->get(),
        ]);
    }
}
