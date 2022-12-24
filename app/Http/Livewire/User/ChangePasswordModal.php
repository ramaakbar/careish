<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordModal extends Component {

    public $password;

    public $password_confirmation;

    public function clear() {
        $this->resetErrorBag();
        $this->reset(['password', 'password_confirmation']);
    }

    protected $rules = [
        'password' => 'required|min:8|max:200|confirmed',
    ];

    public function submit() {
        $this->validate();

        $hashPassword = Hash::make($this->password);

        User::where('id', Auth::id())->update([
            'password' => $hashPassword,
        ]);

        $this->clear();
        return redirect()->to('/user/profile-setting')->with('success', 'Successfully change password');
    }

    public function render() {
        return view('livewire.user.change-password-modal');
    }
}
