<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Availability;
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
            'availabilities' => Availability::all(),
        ]);
    }

    public function update(Request $request,Nurse $nurse){
        $validated = $request->validate([
            'name' => ['required','min:3','max:100'],
            'age' => ['required','gte:15','lte:80'],
            'gender_id' => ['required','gte:1','lte:2'],
            'address' => ['required','min:4','max:100'],
            'availability_id' => ['required','gte:1','lte:3'],
            'picture' => ['image'],
        ]);

        if($request->file('picture')){
            if($request->oldPicture){

            }
            $validated['picture'] = $request->file('picture')->store('images');
        }

        Nurse::where('id',$nurse->id)->update($validated);
        return back()->with('success','Nurse has been updated');

    }

    public function delete(Request $request,Nurse $nurse){
        Nurse::destroy($nurse->id);
        return redirect('/dashboard/nurses')->with('success','Nurse '. 'T'.$nurse->name .' has been deleted');
    }

}
