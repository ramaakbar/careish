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

        $users = User::where('role_id', 1)->with('chat')->orderBy(
            Chat::select('is_seen')->whereColumn('user_id', 'users.id')
                ->orderBy('is_seen')->limit(1)
        )->orderBy('name', 'ASC')->get();

        if (auth()->user()->role_id == 1) {
            $chats = Chat::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();
        } else {
            $chats = Chat::where('user_id', $sender->id)->orWhere('receiver', $sender->id)->orderBy('id', 'DESC')->get();
        }

        return view('chatShow', [
            'users' => $users,
            'chats' => $chats,
            'sender' => $sender,
        ]);
    }
}
