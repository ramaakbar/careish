<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Experience;
use App\Models\Nurse;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNurseModal extends Component {

    use WithFileUploads;

    public $name;

    public $age;

    public $gender_id;

    public $city_id;

    public $province_id;

    public $price;

    public $description;

    public $photo;

    public $skills = [];

    public $skillsList;

    public $ethnicity;

    public $experiences = [];


    public function mount() {
        $this->experiences = [
            []
        ];
        $this->skillsList = Skill::all();
    }

    public function addMoreExperience() {
        $this->experiences[] = [];
    }

    public function removeExperience($index) {
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }

    public function clear() {
        $this->resetErrorBag();
        $this->reset();
    }

    protected $rules = [
        'name' => 'required',
        'age' => 'required',
        'gender_id' => 'required',
        'city_id' => 'required',
        'price' => 'required',
        'description' => 'required',
        'photo' => 'required|image',
        'ethnicity' => 'required',
        // 'experiences.title' => 'required',
        // 'experiences.title' => 'sometimes',
        // 'experiences.description' => 'required',
        // 'experiences.date' => 'required',
    ];

    public function submit() {
        $this->validate();

        $storedImage = $this->photo->store('nurse-images');

        $newNurse = Nurse::create([
            'name' => $this->name,
            'age' => $this->age,
            'gender_id' => $this->gender_id,
            'city_id' => $this->city_id,
            'price' => $this->price,
            'description' => $this->description,
            'picture' => $storedImage,
            'skills' => implode(';', $this->skills),
            'ethnicity' => $this->ethnicity,
        ]);

        foreach ($this->experiences as $experience) {
            if ($experience !== [] && $experience['title'] !== '' && $experience['description'] !== '') {
                Experience::create([
                    'nurse_id' => $newNurse->id,
                    'title' => $experience['title'],
                    'description' => $experience['description'],
                    'date' => $experience['date']
                ]);
            }
        }

        $this->clear();
        session()->flash('success', 'Nurse has successfully been added');
        return redirect()->to('/dashboard/nurses');
    }

    public function render() {
        return view('livewire.dashboard.add-nurse-modal');
    }
}
