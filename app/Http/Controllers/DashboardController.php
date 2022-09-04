<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index');
    }

    public function users(){
        return view('dashboard.users');
    }

    public function transactions(){
        return view('dashboard.transactions');
    }
}
