<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index',[
            'nurses' => Nurse::with(['availability'])->where('availability_id','=','3')->limit(7)->get(),
            'transactions' => Transaction::with(['status'])->limit(7)->orderByDesc('id')->get(),
        ]);
    }

    public function users(){
        return view('dashboard.users');
    }

    public function transactions(){
        return view('dashboard.transactions');
    }

    public function nurses(){
        return view('dashboard.nurses');
    }
}
