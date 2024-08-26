<?php

namespace App\Http\Controllers\Agency;

use App\Models\Application;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Mail\UserApplicationMail;
use App\Models\EmailConfiguration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\DataTables\Agency\RefusedDataTable;
use App\DataTables\Agency\CompletedDataTable;
use App\DataTables\Agency\DeliveredDataTable;
use App\DataTables\Agency\NewArrivalDataTable;
use App\DataTables\Agency\ApplicationDataTable;
use App\DataTables\Agency\InPayProcessDataTable;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    use ImageUploadTrait;
    public function index(ApplicationDataTable $datatable){

        $totalApplications = Application::all()->where('user_id',Auth::user()->id)->count();
        $completedApplications = Application::where('status','completed')->where('user_id',Auth::user()->id)->count();
        $deliveredApplications = Application::where('status','delivered')->where('user_id',Auth::user()->id)->count();
        $inPayProcessApplications = Application::where('status','in_pay_process')->where('user_id',Auth::user()->id)->count();
        $newArrivalAppilcations = Application::where('status','new_arrival')->where('user_id',Auth::user()->id)->count();
        $refusedApplications = Application::where('status','refused')->where('user_id',Auth::user()->id)->count();
    
        return $datatable->render('agency.dashboard',compact(
        'totalApplications',
        'completedApplications',
        'deliveredApplications',
        'inPayProcessApplications',
        'newArrivalAppilcations',
        'refusedApplications'));
    }

    public function createApplication(){
        return view('agency.page.create');
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

    public function seenNotification(){

        Application::where('seen', false)->where('user_id',Auth::user()->id)->update(['seen' => true]);
            return response(['status'=>'success']);
    }

    public function allApplication(ApplicationDataTable $datatable){

        return $datatable->render('agency.application.index');
    }

    public function completedApplication(CompletedDataTable $datatable){
        return $datatable->render('agency.application.completed');
    }

    public function deliveredApplication(DeliveredDataTable $datatable){
        return $datatable->render('agency.application.delivered');
    }

    public function inPayProcessApplication(InPayProcessDataTable $datatable){
        return $datatable->render('agency.application.in-pay-process');
    }

    public function newArrivalApplication(NewArrivalDataTable $datatable){
        return $datatable->render('agency.application.new-arrival');
    }

    public function refusedApplication(RefusedDataTable $datatable){
        return $datatable->render('agency.application.refused');
    }
}
