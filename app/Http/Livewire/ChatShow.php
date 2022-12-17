<?php

namespace App\Http\Livewire;

use App\Models\Chat as ModelsChat;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChatShow extends Component {

    use WithFileUploads;

    public $message = '';
    public $users;
    public $sender;
    public $chats;
    public $file;
    public $admin;

    public function render() {
        return view('livewire.chat-show', [
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
            $this->chats = ModelsChat::where('user_id', $this->sender->id)
                ->orWhere('receiver', $this->sender->id)
                ->orderBy('id', 'DESC')
                ->get();
        }
        $this->users = User::where('role_id', 1)->orderBy(
            ModelsChat::select('is_seen')->whereColumn('user_id', 'users.id')
                ->orderBy('is_seen')->limit(1)
        )->orderBy('name', 'ASC')->get();
        $not_seen = ModelsChat::where('user_id', $this->sender->id)->where('receiver', auth()->id());
        $not_seen->update(['is_seen' => true]);
    }

    public function SendMessage() {
        $new_message = new \App\Models\Chat();
        $new_message->message = $this->message;
        $new_message->user_id = auth()->id();
        $new_message->receiver = $this->sender->id;

        if ($this->file) {
            $uploaded = $this->uploadFile();
            $new_message->file = $uploaded[0];
            $new_message->file_name = $uploaded[1];
        }

        $new_message->save();

        $this->reset('message');
        $this->file = '';
    }

    public function getUser($user_id) {
        $this->clicked_user = User::find($user_id);
        $this->messages = ModelsChat::where('user_id', $user_id)->get();
    }

    public function resetFile() {
        $this->reset('file');
    }

    public function uploadFile() {
        $file = $this->file->store('chats');
        $file_name = $this->file->getClientOriginalName();
        return [$file, $file_name];
    }
}
