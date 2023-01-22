<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class NursesTable extends Component {
    use WithPagination;

    public $gender = '';
    public $province_id = '';
    public $city_id = '';
    public $min_age = '';
    public $max_age = '';
    public $experience = '';
    public $ethnicity = '';

    public function updating() {
        $this->resetPage();
    }


    public function render() {
        $availabilityId = DB::table('availabilities')->select('id')->where('availability', '=', 'Available')->first();
        return view('livewire.nurses-table', [
            'nurses' => DB::table('nurses')->distinct()->leftJoin('transactions', 'transactions.nurse_id', '=', 'nurses.id')
                ->leftJoin('reviews', 'reviews.transaction_id', '=', 'transactions.id')
                ->leftJoin('genders', 'genders.id', '=', 'nurses.gender_id')
                ->leftJoin('cities', 'cities.id', '=', 'nurses.city_id')
                ->leftJoin('provinces', 'provinces.id', '=', 'cities.province_id')
                ->leftJoin('experiences', 'experiences.nurse_id', '=', 'nurses.id')
                ->select(DB::raw('nurses.*, avg(reviews.rating) as rating, genders.gender, cities.name as cityName'))
                ->where('nurses.gender_id', 'LIKE', '%' . $this->gender . '%')
                ->where('nurses.availability_id', '=', $availabilityId->id)
                ->when($this->province_id != '', function ($query) {
                    $query->where('provinces.id', '=', $this->province_id);
                })
                ->when($this->city_id != '', function ($query) {
                    $query->where('nurses.city_id', '=', $this->city_id);
                })
                ->when($this->min_age != '', function ($query) {
                    $query->where('nurses.age', '>=', $this->min_age);
                })
                ->when($this->max_age != '', function ($query) {
                    $query->where('nurses.age', '<=', $this->max_age);
                })
                ->when($this->min_age != '' && $this->max_age != '', function ($query) {
                    $query->whereBetween('nurses.age', [$this->min_age, $this->max_age]);
                })
                ->when($this->experience != '', function ($query) {
                    $query->whereRaw(' YEAR(now()) - YEAR(experiences.date) ' . $this->experience);
                })
                ->when($this->ethnicity != '', function ($query) {
                    $query->where('nurses.ethnicity', '=', $this->ethnicity);
                })
                ->groupBy(DB::raw('nurses.id, nurses.name, nurses.age, nurses.gender_id, nurses.city_id, nurses.picture, nurses.availability_id, nurses.created_at, nurses.updated_at, genders.gender, cities.name, nurses.description, nurses.price, nurses.skills, experiences.date, nurses.ethnicity'))
                ->paginate(6)
        ]);
    }
}
