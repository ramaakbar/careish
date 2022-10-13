<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserReviewsController extends Controller {
    public function index() {
        return view('user.reviews', [
            // 'nurses' => Nurse::where('user_id', Auth::id())->paginate(4),
        ]);
    }
}
