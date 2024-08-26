<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Mail\UserApplicationMail;
use App\Models\EmailConfiguration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\DataTables\Admin\NomadApplicationDataTable;

class NomadApplicationController extends Controller
{

    use ImageUploadTrait;

    public function applicationDetails(string $id){
        $applicationDetail = Application::findOrFail($id);
        return view('admin.nomad-application.application-details',compact('applicationDetail'));
    }

    public function index(NomadApplicationDataTable $datatable){
        return $datatable->render('admin.nomad-application.index');
    }

    public function create(){
        return view('admin.nomad-application.create');
    }

    public function store(Request $request){

        $request->validate([
            'username'=>['required'],
            'email'=>['required'],
            'phone_number'=>['required'],
            'booking_number'=>['required'],
            'flight_number'=>['required'],
            'reason'=>['required'],
            'delay'=>['required'],
            'from'=>['required'],
            'to'=>['required'],
            'depart'=>['nullable'],
            'arrival'=>['nullable'],
            'date'=>['required'],
            'airline'=>['required'],
            'sign.*'=>['required'],
            'boarding_pass'=>['required','file','mimes:jpg,jpeg,png,pdf'],
            'passaport.*'=>['required','file','mimes:jpg,jpeg,png,pdf'],
        ]);

   
        $authUser = Auth::user();
        $emailSetting = EmailConfiguration::first();
        $application = new Application();

        if(is_array($request->sign)){
            $signUrl = $this->uploadMultipleImage($request,'sign','documents');
            $application->sign = implode(',',$signUrl);
        }else{
            $signUrl = $this->uploadImage($request,'sign','documents');
            $application->sign = $signUrl;
        }
        
        if(is_array($request->passaport)){
            $passaportUrl = $this->uploadMultipleImage($request,'passaport','documents');
            $application->passaport = implode(',',$passaportUrl);
        }else{
            $passaportUrl = $this->uploadImage($request,'passaport','documents');
            $application->passaport = $passaportUrl;
        }

        $boardingPath = $this->uploadImage($request,'boarding_pass','documents');
        $schedule_change = $this->uploadImage($request,'schedule_change','documents');
        $denied_boarding = $this->uploadImage($request,'denied_boarding','documents');

        $application->user_id = $authUser->id;
        $application->username = $request->username;
        $application->email = $request->email;
        $application->phone_number = $request->phone_number;
        $application->booking_number = $request->booking_number;
        $application->flight_number = $request->flight_number;
        $application->reason = $request->reason;
        $application->delay = $request->delay;
        $application->from = $request->from;
        $application->to = $request->to;
        $application->depart = $request->depart;
        $application->arrival = $request->arrival;
        $application->date = $request->date;
        $application->airline = $request->airline;
        $application->status = 'new_arrival';
        $application->seen = false;
        $application->boarding_pass = $boardingPath;
        $application->schedule_change = $schedule_change;
        $application->denied_boarding = $denied_boarding;
        $application->save();

        Mail::to($application->email)->send(new UserApplicationMail($emailSetting->email,'Application',$application->id));

        return response()->json(['status'=>'success',
        'message'=>'Application Created Successfully'],201);
    }
}
