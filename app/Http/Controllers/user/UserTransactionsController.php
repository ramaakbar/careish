<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTransactionsController extends Controller {
    public function index() {
        return view('user.transactions');
    }

    public function doTrans($id) {
        $nurse = Nurse::find($id);
        return view('nurseTransaction', [
            'nurse' => $nurse
        ]);
    }
}
