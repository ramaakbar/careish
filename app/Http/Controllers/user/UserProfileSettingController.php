<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfileSettingController extends Controller {
    public function index() {
        return view('user.profile-setting', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request) {
        $user = Auth::user();
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
            'phone_number' => ['required', 'min:4', 'max:20'],
            'picture' => ['image'],
        ]);

        if ($request->file('picture')) {
            if ($request->oldPicture) {
            }
            $validated['picture'] = $request->file('picture')->store('user-images');
        }

        User::where('id', $user->id)->update($validated);
        Alert::toast('Successfully updated profile', 'success');
        return back()->with('success', 'User has been updated');
    }
}
