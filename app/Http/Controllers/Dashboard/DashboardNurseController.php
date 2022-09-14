<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use Illuminate\Http\Request;

class DashboardNurseController extends Controller
{      
    public function nurses(){
        return view('dashboard.nurses');
    }

    public function detail(Nurse $nurse){
        return view('dashboard.nurse-detail',[
            'nurse' => $nurse,
        ]);
    }

    // public function update(Request $request,User $user){
    //     $validated = $request->validate([
    //         'name' => ['required','min:3','max:100'],
    //         'email' => ['required','email',Rule::unique('users')->ignore($user)],
    //         'password' => ['required','min:8','max:200','confirmed'],
    //         'phone_number' => ['required','min:4','max:20'],
    //         'role_id' => ['required'],
    //         'picture' => ['image'],
    //     ]);
    //     $validated['password'] = Hash::make($validated['password']);

    //     if($request->file('picture')){
    //         if($request->oldPicture){

    //         }
    //         $validated['picture'] = $request->file('picture')->store('images');
    //     }

    //     User::where('id',$user->id)->update($validated);
    //     return back()->with('success','User has been updated');

    // }

    public function delete(Request $request,Nurse $nurse){
        Nurse::destroy($nurse->id);
        return redirect('/dashboard/transactions')->with('success','Nurse '. 'T'.$nurse->name .' has been deleted');
    }

}
