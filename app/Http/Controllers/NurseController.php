<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\SavedNurses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function viewNurseDetail($id) {
        $nurse = DB::table('nurses')->leftJoin('transactions', 'transactions.nurse_id', '=', 'nurses.id')
            ->leftJoin('reviews', 'reviews.transaction_id', '=', 'transactions.id')
            ->join('genders', 'genders.id', '=', 'nurses.gender_id')
            ->join('cities', 'cities.id', '=', 'nurses.city_id')
            ->join('provinces', 'provinces.id', '=', 'cities.province_id')
            ->select(DB::raw('nurses.*, avg(reviews.rating) as rating, genders.gender, cities.name as cityName, count(reviews.review) as totalReview, nurses.description as description, provinces.name as province'))
            ->where('nurses.id', '=', $id)
            ->groupBy(DB::raw('nurses.id, nurses.name, nurses.age, nurses.gender_id, nurses.city_id, nurses.picture, nurses.availability_id, nurses.created_at, nurses.updated_at, genders.gender, cities.name, nurses.description, provinces.name, nurses.price, nurses.skills'))
            ->first();
        $totalReview = DB::select(DB::raw('SELECT (SELECT COUNT(rating) FROM reviews r join transactions t ON r.transaction_id = t.id 
            WHERE rating = 5 and nurse_id =:ids) as total5rating, 
            (SELECT COUNT(rating) FROM reviews r join transactions t ON r.transaction_id = t.id WHERE rating = 4 and nurse_id =:ids) as total4rating, 
            (SELECT COUNT(rating) FROM reviews r join transactions t ON r.transaction_id = t.id WHERE rating = 3 and nurse_id =:ids) as total3rating, 
            (SELECT COUNT(rating) FROM reviews r join transactions t ON r.transaction_id = t.id WHERE rating = 2 and nurse_id =:ids) as total2rating, 
            (SELECT COUNT(rating) FROM reviews r join transactions t ON r.transaction_id = t.id WHERE rating = 1 and nurse_id =:ids) as total1rating'), ['ids' => $id]);
        $nurseElo = Nurse::find($id);
        $skill = explode(";", $nurseElo->skills);
        if (Auth::check()) {
            $savedNurse = SavedNurses::where('nurse_id', $id)->where('user_id', auth()->user()->id)->get();
        } else {
            $savedNurse = [];
        }
        // dd($skill);
        // dd($nurse)
        // dd($nurseElo->transaction()->get()[0]->created_at->format('Y'));
        // dd($nurseElo->transaction()->where('user_id', '=', '2')->first()->created_at->format('Y'));
        // dd($nurseElo->review()->get());
        // dd($nurseElo->transaction()->get()[0]->review()->first()->user()->first()->picture);
        // dd($nurseElo->experience()->orderBy('date', 'desc')->get());
        // dd($nurseElo->transaction()->get()->count());
        // Log::info(print_r($nurseElo, true));
        // Log::info(print_r($totalReview, true));
        // Log::info(print_r($nurse, true));
        // Log::info(print_r($savedNurse, true));
        return view('nursesDetail', [
            'nurse' => $nurse,
            'nurseElo' => $nurseElo,
            'totalReview' => $totalReview,
            'savedNurse' => $savedNurse,
        ]);
    }

    public function saveNurse(Nurse $nurse) {
        SavedNurses::updateOrCreate([
            'user_id' => Auth::id(),
            'nurse_id' => $nurse->id
        ]);
        Alert::toast('Nurse is successfuly saved', 'success');
        return back();
    }

    public function deleteSavedNurse(Nurse $nurse) {
        SavedNurses::where('nurse_id', $nurse->id)->where('user_id', auth()->user()->id)->delete();
        Alert::toast('Nurse is successfuly deleted', 'success');
        return back();
    }
}
