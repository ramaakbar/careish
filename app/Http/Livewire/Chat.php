<?php

namespace App\Http\Livewire;

use App\Models\Chat as ModelsChat;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Chat extends Component {
    use WithFileUploads;

    public $message = '';
    public $users;
    public $clicked_user;
    public $chats;
    public $file;
    public $admin;

    public function render() {
        return view('livewire.chat', [
            'users' => $this->users,
            'admin' => $this->admin
        ]);
    }

    public function mount() {
        $this->mountComponent();
    }

    public function mountComponent() {
        if (auth()->user()->role_id == 1) {
            $this->chats = ModelsChat::where('user_id', auth()->id())
                ->orWhere('receiver', auth()->id())
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $this->chats = ModelsChat::where('user_id', $this->clicked_user)
                ->orWhere('receiver', $this->clicked_user)
                ->orderBy('id', 'DESC')
                ->get();
            $this->users = User::where('role_id', 1)->orderBy(
                ModelsChat::select('is_seen')->whereColumn('user_id', 'users.id')
                    ->orderBy('is_seen')->limit(1)
            )->orderBy('name', 'ASC')->get();
        }
        $this->admin = User::where('role_id', 2)->first();
    }

    public function SendMessage() {
        $new_message = new \App\Models\Chat();
        $new_message->message = $this->message;
        $new_message->user_id = auth()->id();
        if (auth()->user()->role_id == 1) {
            $admin = User::where('role_id', 2)->first();
            $this->user_id = $admin->id;
        } else {
            $this->user_id = $this->clicked_user->id;
        }
        $new_message->receiver = $this->user_id;

        // Deal with the file if uploaded
        if ($this->file) {
            $file = $this->file->store('chats');
            $new_message->file = $file;
            $new_message->file_name = $this->file->getClientOriginalName();
        }
        $new_message->save();

        // Clear the message after it's sent
        $this->reset(['message']);
        $this->file = '';
    }

    public function getUser($user_id) {
        $this->clicked_user = User::find($user_id);
        $this->messages = ModelsChat::where('user_id', $user_id)->get();
    }

    public function resetFile() {
        $this->reset('file');
    }
}
