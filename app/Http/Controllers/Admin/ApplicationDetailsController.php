<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Http\Controllers\Controller;
use App\Mail\CompletedMail;
use App\Mail\DeliveredMail;
use App\Mail\PayProcessMail;
use App\Mail\RefusedMail;
use App\Models\Application;
use App\Models\EmailConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ApplicationDetailsController extends Controller{
    



    public function index(string $id){
        $applicationDetail = Application::findOrFail($id);
        return view('admin.application.details.index',compact('applicationDetail'));
    }

    public function updateStatus(Request $request){
        $application = Application::findOrFail($request->id);
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
}

