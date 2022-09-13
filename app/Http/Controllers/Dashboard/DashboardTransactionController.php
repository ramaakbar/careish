<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardTransactionController extends Controller
{
    public function transactions(){
        return view('dashboard.transactions');
    }

}
