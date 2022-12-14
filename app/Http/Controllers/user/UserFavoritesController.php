<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\SavedNurses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoritesController extends Controller {
    public function index() {
        return view('user.favorites', [
            'favorites' => SavedNurses::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate(6),
        ]);
    }
}
