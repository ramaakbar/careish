<?php

namespace App\Http\Livewire\Component;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Trix extends Component {
    use WithFileUploads;

    const EVENT_VALUE_UPDATED = 'trix_value_updated';
    public $value;
    public $trixId;
    public $photos = [];

    public function mount($value = '') {
        $this->value = $value;
        $this->trixId = 'trix-' . uniqid();
    }

    public function updatedValue($value) {
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
    }

    public function completeUpload(string $uploadedUrl, string $trixUploadCompletedEvent) {

        foreach ($this->photos as $photo) {
            if ($photo->getFilename() == $uploadedUrl) {
                $newFilename = $photo->store('post-images');
                $url = Storage::url($newFilename);
                $this->dispatchBrowserEvent($trixUploadCompletedEvent, [
                    'url' => $url,
                    'href' => $url,
                ]);
            }
        }
    }

    public function render() {
        return view('livewire.component.trix');
    }
}
