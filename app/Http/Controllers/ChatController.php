<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller {
    public function index() {
        $users = User::where('role_id', 1)->orderBy('id', 'DESC')->get();
        if (auth()->user()->role_id == 1) {
            $chats = Chat::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();
        }

        return view('chatHome', [
            'users' => $users,
            'chats' => $chats ?? null
        ]);
    }

    public function show($id) {
        if (auth()->user()->role_id == 1) {
            abort(404);
        }

        $sender = User::findOrFail($id);

        $users = User::with(['chat' => function ($query) {
            return $query->orderBy('created_at', 'ASC');
        }])->where('role_id', 1)
            ->orderBy('id', 'ASC')
            ->get();

        if (auth()->user()->role_id == 1) {
            $chats = Chat::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'ASC')->get();
        } else {
            $chats = Chat::where('user_id', $sender->id)->orWhere('receiver', $sender->id)->orderBy('id', 'ASC')->get();
        }

        return view('chatShow', [
            'users' => $users,
            'chats' => $chats,
            'sender' => $sender,
        ]);
    }
}
