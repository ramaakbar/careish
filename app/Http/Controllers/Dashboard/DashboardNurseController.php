<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardNurseController extends Controller
{      
    public function nurses(){
        return view('dashboard.nurses');
    }
}
