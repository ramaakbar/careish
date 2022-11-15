<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:200|confirmed',
        ]);

        $validated['phone_number'] = '';
        $validated['role_id'] = 1;
        $validated['password'] = Hash::make($validated['password']);
        $validated['picture'] = 'user-images/placeholder_profile.jpeg';

        User::create($validated);
        return redirect('/login')->with('success', 'Account successfully created! you can now login');
    }
}
