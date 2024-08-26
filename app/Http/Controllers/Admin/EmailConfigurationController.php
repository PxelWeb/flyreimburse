<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailConfiguration;
use Illuminate\Http\Request;

class EmailConfigurationController extends Controller{
    



    public function index(){

        $emailSettings = EmailConfiguration::first();
        return view('admin.email-configuration.index',compact('emailSettings'));
    }


    public function update(Request $request){

        $request->validate([
            
            'email'=>['required','email'],
            'username'=>['required'],
            'password'=>['required'],
            'host'=>['required'],
            'port'=>['required'],
            'encryption'=>['required']
        ]);


        EmailConfiguration::updateOrInsert(
            ['id'=>1],
            [
                'email'=>$request->email,
                'username'=>$request->username,
                'password'=>$request->password,
                'host'=>$request->host,
                'port'=>$request->port,
                'encryption'=>$request->encryption
            ]
            );

            toastr('Updated Successfully','success');
            return redirect()->back();
    }
}
