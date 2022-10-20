<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NurseController extends Controller {
    public function viewNurse() {
        // $nurse = Nurse::paginate(6);
        // $nurse = DB::table('nurses')->leftJoin('reviews', 'nurses.id', '=', 'reviews.nurse_id')->join('genders', 'genders.id', '=', 'nurses.gender_id')
        //     ->join('cities', 'cities.id', '=', 'nurses.city_id')
        //     ->select(DB::raw('nurses.*, avg(reviews.rating) as rating, genders.gender, cities.name as cityName'))
        //     ->groupBy(DB::raw('nurses.id, nurses.name, nurses.age, nurses.gender_id, nurses.city_id, nurses.picture, nurses.availability_id, nurses.created_at, nurses.updated_at, genders.gender, cities.name'))
        //     ->paginate(6);
        return view('browseNurses');
    }
}
