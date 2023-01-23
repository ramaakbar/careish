<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


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
            return redirect('/')->with('success', 'You are now logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    function getSocialAvatar($file, $path) {
        $fileContents = file_get_contents($file);
        $filename = Str::random(10) . ".jpg";
        File::put(public_path() . $path . $filename, $fileContents);
        return "user-images/" . $filename;
    }

    public function google() {
        return Socialite::driver('google')->with(["prompt" => "select_account"])->redirect();
    }

    public function googleRedirect() {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => Hash::make(fake()->uuid()),
            'phone_number' => '',
            'role_id' => 1,
            'picture' => $this->getSocialAvatar($googleUser->getAvatar(), '/storage/user-images/') ?? 'user-images/placeholder_profile.jpeg',
        ]);

        Auth::login($user);
        return redirect('/')->with('success', 'You are now logged in!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Successfully Logout!');
    }
}
