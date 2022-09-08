<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Nurse;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNurseModal extends Component
{

    use WithFileUploads;

    public $name;

    public $age;

    public $gender_id;

    public $address;

    public $photo;

    public function clear()
    {
        $this->resetErrorBag();
        $this->reset(['name', 'age','gender_id','address','photo']);
    }

    protected $rules = [
        'name' => 'required',
        'age' => 'required',
        'gender_id' => 'required',
        'address' => 'required|max:100',
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
            'address' => $this->address,
            'picture' => $storedImage,
        ]);

        $this->reset(['name', 'age','gender_id','address','photo']);
        session()->flash('alert', 'Nurse has successfully been added');
        return redirect()->to('/dashboard/nurses');
    }

    public function render()
    {
        return view('livewire.dashboard.add-nurse-modal');
    }
}
