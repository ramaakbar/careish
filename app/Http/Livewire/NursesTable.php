<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NursesTable extends Component {
    public $gender = '';
    public $province_id = '';
    public $city_id = '';

    public function render() {
        $availabilityId = DB::table('availabilities')->select('id')->where('availability', '=', 'Available')->first();
        // dd($availabilityId);
        return view('livewire.nurses-table', [
            'nurses' => DB::table('nurses')->leftJoin('transactions', 'transactions.nurse_id', '=', 'nurses.id')
                ->leftJoin('reviews', 'reviews.transaction_id', '=', 'transactions.id')
                ->join('genders', 'genders.id', '=', 'nurses.gender_id')
                ->join('cities', 'cities.id', '=', 'nurses.city_id')
                ->join('provinces', 'provinces.id', '=', 'cities.province_id')
                ->select(DB::raw('nurses.*, avg(reviews.rating) as rating, genders.gender, cities.name as cityName'))
                ->where('nurses.gender_id', 'LIKE', '%' . $this->gender . '%')
                ->where('nurses.availability_id', '=', $availabilityId->id)
                ->when($this->province_id != '', function ($query) {
                    $query->where('provinces.id', '=', $this->province_id);
                })
                ->when($this->city_id != '', function ($query) {
                    $query->where('nurses.city_id', '=', $this->city_id);
                })
                ->groupBy(DB::raw('nurses.id, nurses.name, nurses.age, nurses.gender_id, nurses.city_id, nurses.picture, nurses.availability_id, nurses.created_at, nurses.updated_at, genders.gender, cities.name, nurses.description, nurses.price, nurses.skills'))
                ->paginate(6)
        ]);
    }
}
