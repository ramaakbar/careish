<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Nurse;
use App\Traits\WithSorting as TraitsWithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class NursesDashboardTable extends Component {
    use WithPagination;

    use TraitsWithSorting;

    public $status = '';

    public $gender = '';

    public $deleteId = '';

    public function getDeleteId($id) {
        $this->deleteId = $id;
    }

    public function delete() {
        Nurse::destroy($this->deleteId);
        session()->flash('success', 'Nurse no ' . $this->deleteId . ' has successfully been deleted');
        return redirect()->to('/dashboard/nurses');
    }

    public function render() {

        if ($this->status == '' && $this->gender == '') {
            $nurses = Nurse::select('nurses.*', 'cities.province_id')->join('cities', 'nurses.city_id', '=', 'cities.id')->join('provinces', 'cities.province_id', '=', 'provinces.id')->where('nurses.id', 'like', '%' . $this->search . '%')->orWhere('nurses.name', 'like', '%' . $this->search . '%')->orWhere('cities.name', 'like', '%' . $this->search . '%')->orWhere('provinces.name', 'like', '%' . $this->search . '%')->orderBy($this->sort, $this->sortOrder)->with(['gender', 'availability', 'city', 'city.province'])->paginate($this->perPage);
        } elseif ($this->gender == '') {
            $nurses = Nurse::select('nurses.*', 'cities.province_id')->join('cities', 'nurses.city_id', '=', 'cities.id')->join('provinces', 'cities.province_id', '=', 'provinces.id')->where('availability_id', '=', $this->status)->where(function ($query) {
                $query->where('nurses.id', 'like', '%' . $this->search . '%')
                    ->orWhere('nurses.name', 'like', '%' . $this->search . '%')->orWhere('cities.name', 'like', '%' . $this->search . '%')
                    ->orWhere('provinces.name', 'like', '%' . $this->search . '%');
            })->orderBy($this->sort, $this->sortOrder)->with(['gender', 'availability', 'city', 'city.province'])->paginate($this->perPage);
        } elseif ($this->status == '') {
            $nurses = Nurse::select('nurses.*', 'cities.province_id')->join('cities', 'nurses.city_id', '=', 'cities.id')->join('provinces', 'cities.province_id', '=', 'provinces.id')->Where('gender_id', '=', $this->gender)->where(function ($query) {
                $query->where('nurses.id', 'like', '%' . $this->search . '%')
                    ->orWhere('nurses.name', 'like', '%' . $this->search . '%')->orWhere('cities.name', 'like', '%' . $this->search . '%')
                    ->orWhere('provinces.name', 'like', '%' . $this->search . '%');
            })->orderBy($this->sort, $this->sortOrder)->with(['gender', 'availability', 'city', 'city.province'])->paginate($this->perPage);
        } else {
            $nurses = Nurse::select('nurses.*', 'cities.province_id')->join('cities', 'nurses.city_id', '=', 'cities.id')->join('provinces', 'cities.province_id', '=', 'provinces.id')->where('availability_id', '=', $this->status)->where('gender_id', '=', $this->gender)->where(function ($query) {
                $query->where('nurses.id', 'like', '%' . $this->search . '%')
                    ->orWhere('nurses.name', 'like', '%' . $this->search . '%')->orWhere('cities.name', 'like', '%' . $this->search . '%')
                    ->orWhere('provinces.name', 'like', '%' . $this->search . '%');
            })->orderBy($this->sort, $this->sortOrder)->with(['gender', 'availability', 'city', 'city.province'])->paginate($this->perPage);
        }

        return view('livewire.dashboard.nurses-dashboard-table', [
            'nurses' => $nurses,
        ]);
    }
}
