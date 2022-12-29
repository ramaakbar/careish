<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Experience;
use App\Models\Nurse;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithFileUploads;

class NurseDetailUpdate extends Component {
    use WithFileUploads;

    public $nurse;

    public $availabilities;

    public $name;

    public $gender_id;

    public $age;

    public $price;

    public $availability_id;

    public $picture;

    public $oldPicture;

    public $description;

    public $city_id;

    public $province_id;

    public $skills = [];

    public $skillsList;

    public $ethnicity;

    public $experiences = [];

    protected $rules = [
        'name' => ['required', 'min:3', 'max:100'],
        'age' => ['required', 'gte:15', 'lte:80'],
        'gender_id' => ['required', 'gte:1', 'lte:2'],
        'city_id' => ['required', 'gte:1', 'lte:300'],
        'price' => ['required', 'gte:1'],
        'description' => ['required', 'min:3'],
        'availability_id' => ['required', 'gte:1', 'lte:3'],
        'picture' => ['image', 'nullable'],
        'ethnicity' => ['required']
    ];

    public function mount() {
        $this->name = $this->nurse->name;
        $this->gender_id = $this->nurse->gender_id;
        $this->age = $this->nurse->age;
        $this->price = $this->nurse->price;
        $this->availability_id = $this->nurse->availability_id;
        $this->oldPicture = $this->nurse->picture;
        $this->description = $this->nurse->description;
        $this->city_id = $this->nurse->city_id;
        $this->province_id = $this->nurse->city->province_id;
        $this->skillsList = Skill::all();
        $this->skills = explode(';', $this->nurse->skills);
        $this->ethnicity = $this->nurse->ethnicity;
        foreach (Experience::where('nurse_id', $this->nurse->id)->get() as $experience) {
            $this->experiences[] = $experience;
        }
    }

    public function addMoreExperience() {
        $this->experiences[] = [];
    }

    public function removeExperience($index) {
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }

    public function submit() {
        $this->validate();

        // dd([
        //     'name' => $this->name,
        //     'gender_id' => $this->gender_id,
        //     'age' => $this->age,
        //     'price' => $this->price,
        //     'availability_id' => $this->availability_id,
        //     // 'picture' => $storedImage,
        //     'description' => $this->description,
        //     'city_id' => $this->city_id,
        //     'skills' => implode(';', $this->skills),
        //     'experiences' => $this->experiences
        // ]);


        if ($this->picture == null) {
            $storedImage = $this->oldPicture;
        } else {
            $storedImage = $this->picture->store('nurse-images');
        }

        Nurse::where('id', $this->nurse->id)->update([
            'name' => $this->name,
            'gender_id' => $this->gender_id,
            'age' => $this->age,
            'price' => $this->price,
            'availability_id' => $this->availability_id,
            'picture' => $storedImage,
            'description' => $this->description,
            'city_id' => $this->city_id,
            'skills' => implode(';', $this->skills),
            'ethnicity' => $this->ethnicity
        ]);
        Experience::where('nurse_id', $this->nurse->id)->delete();

        foreach ($this->experiences as $experience) {
            if ($experience !== [] && $experience['title'] !== '' && $experience['description'] !== '') {
                Experience::create([
                    'nurse_id' => $this->nurse->id,
                    'title' => $experience['title'],
                    'description' => $experience['description'],
                    'date' => $experience['date']
                ]);
            }
        }
        session()->flash('success', 'Nurse has been updated');
        return redirect("/dashboard/nurses/{$this->nurse->id}");
    }

    public function render() {
        return view('livewire.dashboard.nurse-detail-update');
    }
}
