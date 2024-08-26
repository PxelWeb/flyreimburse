<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgencyProfileController extends Controller
{
    

    public function index(){
        return view('agency.profile.index');
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name'=>['required','max:100'],
            'email'=>['required','email','unique:users,email,'.Auth::user()->id],
        ]);
        $user=Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile Updated Successfully!');
        return redirect()->back();
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password'=>['required','current_password'],
            'password'=>['required','confirmed','min:8']
        ]);
 
        $request->user()->update([
            'password'=>bcrypt($request->password)
        ]);
 
        toastr()->success('Password Updated Successfully!');
        return redirect()->back();
     }
}
