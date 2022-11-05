<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserReviewsController extends Controller {
    public function index() {
        return view('user.reviews', [
            'reviews' => Review::where('user_id', Auth::id())->paginate(4),
        ]);
    }

    public function delete(Request $request, Review $review) {
        Review::destroy($review->id);
        Alert::toast('Review successfully deleted', 'success');
        return redirect()->to('/user/reviews');
    }
}
