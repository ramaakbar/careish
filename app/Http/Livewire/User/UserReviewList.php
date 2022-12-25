<?php

namespace App\Http\Livewire\User;

use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class UserReviewList extends Component {
    use WithPagination;
    use Actions;

    public $reviewId = 0;
    public $show;
    public $reviewModel;
    public $review = '';
    public $rating;

    protected $rules = [
        'rating' => 'required',
        'review' => 'required|min:5|max:210',
    ];

    public function submit() {
        $this->validate();

        Review::where('id', $this->reviewId)->update([
            'rating' => $this->rating,
            'review' => $this->review
        ]);

        $this->reset();
        $this->resetErrorBag();
        return redirect()->to('/user/reviews')->with('success', 'Successfully update review');
    }

    public function getReviewId($id) {
        $this->reviewId = $id;
        $this->reviewModel = Review::find($id);
        $this->review = $this->reviewModel->review;
        $this->rating = $this->reviewModel->rating;
        $this->show = true;
    }

    public function delete($reviewId) {
        Review::destroy($reviewId);
        session()->flash('success', 'Review no ' . $reviewId . ' has successfully been deleted');
        return redirect()->to('/user/reviews');
    }


    public function deleteConfirm($reviewId) {
        $this->dialog()->confirm([
            'title'       => 'Confirmation',
            'description' => 'Are you sure you want to delete this
            review?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Im sure',
                'method' => 'delete',
                'params' => $reviewId
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function render() {
        $tempTrans = Transaction::where('user_id', Auth::id())->get();
        $arrTransId = [];
        foreach ($tempTrans as $trans) {
            array_push($arrTransId, $trans->id);
        }
        // dd(Review::whereIn('transaction_id', $arrTransId)->get());
        return view('livewire.user.user-review-list', [
            'reviews' => Review::whereIn('transaction_id', $arrTransId)->orderBy('created_at', 'DESC')->paginate(4),
        ]);
    }
}
