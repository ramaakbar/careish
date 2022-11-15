<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardUserController extends Controller {
    public function users() {
        return view('dashboard.users');
    }

    public function detail(User $user) {
        return view('dashboard.user-detail', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'min:8', 'max:200', 'confirmed'],
            'phone_number' => ['required', 'min:4', 'max:20'],
            'role_id' => ['required'],
            'picture' => ['image'],
        ]);
        $validated['password'] = Hash::make($validated['password']);

        if ($request->file('picture')) {
            if ($request->oldPicture) {
            }
            $validated['picture'] = $request->file('picture')->store('user-images');
        }

        User::where('id', $user->id)->update($validated);
        return back()->with('success', 'User has been updated');
    }

    public function delete(Request $request, User $user) {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User ' . $user->name . ' has been deleted');
    }
}
