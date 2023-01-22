<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Availability;
use App\Models\Nurse;
use App\Traits\WithSorting as TraitsWithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class NursesDashboardTable extends Component {
    use WithPagination;

    use TraitsWithSorting;

    use Actions;

    public $status = '';

    public $gender = '';

    public function updating() {
        $this->resetPage();
    }

    public function delete($nurseId) {
        Nurse::destroy($nurseId);
        session()->flash('success', 'Nurse no ' . $nurseId . ' has successfully been deleted');
        return redirect()->to('/dashboard/nurses');
    }

    public function deleteConfirm($nurseId) {
        $this->dialog()->confirm([
            'title'       => 'Confirmation',
            'description' => 'Are you sure you want to delete this
            nurse?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Im sure',
                'method' => 'delete',
                'params' => $nurseId
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
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
            'statuses' => Availability::get()
        ]);
    }
}
