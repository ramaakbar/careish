<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        return view('dashboard.index', [
            'nurses' => Nurse::with(['availability'])->where('availability_id', '=', '3')->limit(7)->get(),
            'transactions' => Transaction::with(['status'])->limit(7)->orderByDesc('created_at')->get(),
            'transWeek' => Transaction::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count(),
            'income' => Transaction::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('price'),
            'regiseredUser' => User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count(),
        ]);
    }
}
