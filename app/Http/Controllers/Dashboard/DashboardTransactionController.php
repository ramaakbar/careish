<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardTransactionController extends Controller
{
    public function transactions(){
        return view('dashboard.transactions');
    }

    public function detail(Transaction $transaction){
        return view('dashboard.transaction-detail',[
            'transaction' => $transaction,
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

    public function delete(Request $request,Transaction $transaction){
        Transaction::destroy($transaction->id);
        return redirect('/dashboard/transactions')->with('success','Transaction '. 'T'.$transaction->id .' has been deleted');
    }

}
