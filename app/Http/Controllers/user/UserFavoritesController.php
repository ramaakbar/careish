<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoritesController extends Controller {
    public function index() {
        return view('user.favorites', [
            // 'nurses' => Nurse::where('user_id', Auth::id())->paginate(4),
        ]);
    }
}
