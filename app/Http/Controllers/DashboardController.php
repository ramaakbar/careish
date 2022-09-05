<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index',[
            'nurses' => Nurse::with(['availability'])->where('availability_id','=','3')->limit(7)->get(),
        ]);
    }

    public function users(){
        return view('dashboard.users',[
            'users' => User::paginate(10),
        ]);
    }

    public function transactions(){
        return view('dashboard.transactions');
    }

    public function nurses(){
        return view('dashboard.nurses',[
            'nurses' => Nurse::with(['gender','availability'])->paginate(10),
        ]);
    }
}
