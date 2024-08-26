<?php

namespace App\Http\Controllers\Frontend;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Mail\UserApplicationMail;
use App\Models\EmailConfiguration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use function Spatie\LaravelPdf\Support\pdf;

class UserApplicationController extends Controller
{

    use ImageUploadTrait;

    public function form1(){
        return view('frontend.application.index');
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



       $emailSettingdd = EmailConfiguration::first();
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

        // Mail::to($application->email)->send(new UserApplicationMail($emailSettingdd->email,'Application',$application->id));

        return response()->json(['status'=>'success',
        'message'=>'Application Created Successfully'],201);
    }


    public function termsAndConditions(){
        return view('frontend.pages.terms-and-conditions');
    }

    public function privacyPolicy(){
        return view('frontend.pages.privacy-policy');
    }
}
