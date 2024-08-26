<?php

namespace App\Http\Controllers\Admin;


use App\Models\Application;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\RefusedDataTable;
use App\DataTables\Admin\CompletedDataTable;
use App\DataTables\Admin\DeliveredDataTable;
use App\DataTables\Admin\NewArrivalDataTable;
use App\DataTables\Admin\ApplicationDataTable;
use App\DataTables\Admin\InPayProcessDataTable;

class ApplicationController extends Controller
{

    public function index(ApplicationDataTable $datatable){

        $totalApplications = Application::all()->count();
        $completedApplications = Application::where('status','completed')->count();
        $deliveredApplications = Application::where('status','delivered')->count();
        $inPayProcessApplications = Application::where('status','in_pay_process')->count();
        $newArrivalAppilcations = Application::where('status','new_arrival')->count();
        $refusedApplications = Application::where('status','refused')->count();
    
        return $datatable->render('admin.dashboard',compact( 
        'totalApplications',
        'completedApplications',
        'deliveredApplications',
        'inPayProcessApplications',
        'newArrivalAppilcations',
        'refusedApplications'
         ));
    }

    public function createApplication(){
        return view('admin.page.create-application');
    }

    public function seenNotification(){

        Application::where('seen', false)->update(['seen' => true]);
            return response(['status'=>'success']);
    }

    public function allApplication(ApplicationDataTable $datatable){

        return $datatable->render('admin.application.index');
    }

    public function completedApplication(CompletedDataTable $datatable){
        return $datatable->render('admin.application.completed');
    }

    public function deliveredApplication(DeliveredDataTable $datatable){
        return $datatable->render('admin.application.delivered');
    }

    public function inPayProcessApplication(InPayProcessDataTable $datatable){
        return $datatable->render('admin.application.in-pay-process');
    }

    public function newArrivalApplication(NewArrivalDataTable $datatable){
        return $datatable->render('admin.application.new-arrival');
    }

    public function refusedApplication(RefusedDataTable $datatable){
        return $datatable->render('admin.application.refused');
    }

}
