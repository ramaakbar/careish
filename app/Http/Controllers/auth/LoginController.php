<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller {
    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            // Alert::success('Success Title', 'Success Message');
            Alert::toast('You are now logged in!', 'success');
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function google() {
        return Socialite::driver('google')->with(["prompt" => "select_account"])->redirect();
    }

    public function googleRedirect() {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => Hash::make(fake()->uuid()),
            'phone_number' => '',
            'role_id' => 1,
            'picture' => $googleUser->getAvatar() ?? 'assets/placeholder_profile.jpeg',
        ]);

        Auth::login($user);
        Alert::toast('You are now logged in!', 'success');
        return redirect('/');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Successfully Logout!');
    }
}
