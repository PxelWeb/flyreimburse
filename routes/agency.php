<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agency\ApplicationController;
use App\Http\Controllers\Agency\AgencyProfileController;
use App\Http\Controllers\Agency\ApplicationDetailsController;


Route::domain('system.flyreimburse.com')->group(function () {
Route::group(['middleware'=>['auth','role:agency','user.status'],'prefix'=>'agency','as'=>'agency.'],function(){
     
     //Dashboard
     Route::get('dashboard',[ApplicationController::class,'index'])->name('dashboard');

     //Create Application 
     Route::get('create-application',[ApplicationController::class,'createApplication'])->name('create-application');
     Route::post('store-application',[ApplicationController::class,'store'])->name('store-application');

    //Notification
    Route::put('notification',[ApplicationController::class,'seenNotification'])->name('update-notification');

    //AdminProfile
    Route::get('profile',[AgencyProfileController::class,'index'])->name('profile.index');
    Route::put('profile/update',[AgencyProfileController::class,'updateProfile'])->name('profile.update');
    Route::put('profile-password/password',[AgencyProfileController::class,'updatePassword'])->name('password.update');

    //Applications
    Route::get('all-applications',[ApplicationController::class,'allApplication'])->name('all-applications');
    Route::get('completed/applications',[ApplicationController::class,'completedApplication'])->name('completed-application');
    Route::get('delivered/applications',[ApplicationController::class,'deliveredApplication'])->name('delivered-application');
    Route::get('in-pay-process/applications',[ApplicationController::class,'inPayProcessApplication'])->name('in-pay-process-application');
    Route::get('new-arrival/applications',[ApplicationController::class,'newArrivalApplication'])->name('new-arrival-application');
    Route::get('refused/applications',[ApplicationController::class,'refusedApplication'])->name('refused-application');

    //ApplicationDetails
    Route::put('application-detail/update-status',[ApplicationDetailsController::class,'updateStatus'])->name('application.update-status');
    Route::get('application-detail/{id}',[ApplicationDetailsController::class,'index'])->name('application-details');
    
  });
});