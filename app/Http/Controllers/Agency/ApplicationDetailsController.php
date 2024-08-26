<?php

namespace App\Http\Controllers\Agency;

use App\Mail\RefusedMail;
use App\Mail\CompletedMail;
use App\Mail\DeliveredMail;
use App\Models\Application;
use App\Mail\PayProcessMail;
use Illuminate\Http\Request;
use App\Models\EmailConfiguration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApplicationDetailsController extends Controller
{

    public function index(string $id){
        $applicationDetail = Application::findOrFail($id);
        if($applicationDetail->user_id == Auth::user()->id){
            return view('agency.application.details.index',compact('applicationDetail'));
        }else{
            return abort(404);
        }
    }

    public function updateStatus(Request $request){
        $application = Application::findOrFail($request->id);
        if ($application->user_id !== Auth::user()->id) {
            abort(403);
        }
        $name = explode(',',$application->username)[0];
        $emailSetting = EmailConfiguration::first();

        $application->status = $request->status;
        $application->save();
        if($request->status == 'delivered'){
            $subject = 'Your Reimbursement Request Has Been Delivered';
            Mail::to($application->email)->send(new DeliveredMail($name,$emailSetting->email,$subject));
        }elseif($request->status == 'in_pay_process'){
            $subject = 'Your Reimbursement Request is In Payment Process';
            Mail::to($application->email)->send(new PayProcessMail($name, $emailSetting->email,$subject));
        }elseif($request->status == 'refused'){
            $subject = 'Your Reimbursement Request Has Been Refused';
            Mail::to($application->email)->send(new RefusedMail($name,$emailSetting->email,$subject));
        }elseif($request->status == 'completed'){
            $subject = 'Your Reimbursement Request Has Been Completed';
            Mail::to($application->email)->send(new CompletedMail($name,$emailSetting->email,$subject));
        }
        return response(['status'=>'sucess','message'=>'Updated Successfully']);
    }



    public function download(Request $request){

        $file_path = public_path($request->query('filename'));
        if(file_exists($file_path)){
            return response()->download($file_path);
        }else{
            return abort(404);
        }
    }
}
