<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Nurse;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNurseModal extends Component {

    use WithFileUploads;

    public $name;

    public $age;

    public $gender_id;

    public $city_id;

    public $province_id;

    public $photo;

    public function clear() {
        $this->resetErrorBag();
        $this->reset(['name', 'age', 'gender_id', 'city_id', 'province_id', 'photo']);
    }

    protected $rules = [
        'name' => 'required',
        'age' => 'required',
        'gender_id' => 'required',
        'city_id' => 'required',
        'photo' => 'required|image',
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        $this->validate();

        $storedImage = $this->photo->store('images');

        Nurse::create([
            'name' => $this->name,
            'age' => $this->age,
            'gender_id' => $this->gender_id,
            'city_id' => $this->city_id,
            'picture' => $storedImage,
        ]);

        $this->reset(['name', 'age', 'gender_id', 'city_id', 'province_id', 'photo']);
        session()->flash('success', 'Nurse has successfully been added');
        return redirect()->to('/dashboard/nurses');
    }

    public function render() {
        return view('livewire.dashboard.add-nurse-modal');
    }
}
