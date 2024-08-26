<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ManageUserDataTable;
use App\Http\Controllers\Controller;
use App\Mail\AccountCreateMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManageUserController extends Controller
{

    public function index(ManageUserDataTable $datatable){

        return $datatable->render('admin.manage-user.index');
    }

    public function create(){
        return view('admin.manage-user.create');
    }


    public function store(Request $request){

        
        $request->validate([
            'name'=>['required'],
            'email'=>['required','unique:users,email'],
            'password'=>['required','min:8','confirmed'],
            'status'=>['required']
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'agency';
        $user->status = $request->status;
        $user->save();

        Mail::to($user->email)->send(new AccountCreateMail($user->name,$user->email,$request->password));
        toastr('Created Successfully!', 'success', 'success');
         return redirect()->route('admin.manage-user.index');
    }

    public function destroy($id){

        $user = User::findOrFail($id);
        if($user->role == 'admin'){
            toastr('Admin could not be deleted','error');
            return redirect()->back();
        }
        $user->delete();
        return response(['status'=>'success','message'=>'Deleted Successfully']);
    }


    public function changeStatus(Request $request){

        $user = User::findOrfail($request->id);
        $user->status = $request->status == 'true' ? 'active' : 'inactive';
        $user->save();

        return response(['message' => 'Status has been updated!']);
    }
}
