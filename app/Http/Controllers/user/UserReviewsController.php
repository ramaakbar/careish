<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class UserReviewsController extends Controller {
    public function index() {
        return view('user.reviews');
    }

    public function delete(Request $request, Review $review) {
        Review::destroy($review->id);
        return redirect()->to('/user/reviews')->with('success', 'Review successfully deleted');
    }
}
