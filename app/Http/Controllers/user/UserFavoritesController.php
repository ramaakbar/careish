<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\SavedNurses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserFavoritesController extends Controller {
    public function index() {
        return view('user.favorites', [
            'favorites' => DB::table('saved_nurses')
                ->leftJoin('nurses', 'nurses.id', '=', 'saved_nurses.nurse_id')
                ->leftJoin('transactions', 'transactions.nurse_id', '=', 'nurses.id')
                ->leftJoin('reviews', 'reviews.transaction_id', '=', 'transactions.id')
                ->leftJoin('genders', 'genders.id', '=', 'nurses.gender_id')
                ->leftJoin('cities', 'cities.id', '=', 'nurses.city_id')
                ->select(DB::raw('saved_nurses.*, avg(reviews.rating) as rating,nurses.id as nurseId,nurses.picture as nursePic,nurses.name as nurseName,genders.gender,cities.name as cityName,nurses.age as nurseAge'))
                ->where('saved_nurses.user_id', Auth::id())
                ->orderBy('created_at', 'DESC')
                ->groupBy(DB::raw('saved_nurses.id,saved_nurses.user_id,saved_nurses.nurse_id,saved_nurses.created_at,saved_nurses.updated_at'))
                ->paginate(6)
        ]);
    }
}
