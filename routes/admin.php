
<?php

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\ApplicationFunctionController;
use App\Http\Controllers\Admin\NomadApplicationController;
use App\Http\Controllers\Admin\ApplicationDetailsController;
use App\Http\Controllers\Admin\EmailConfigurationController;

Route::domain('system.flyreimburse.com')->group(function () {
     require __DIR__.'/auth.php';
    //  Dashboard
     Route::get('/',[ApplicationController::class,'index'])->name('admin.dashboard')->middleware(['auth','role:admin']);

    Route::group(['middleware'=>['auth','role:admin'],'prefix'=>'admin','as'=>'admin.'],function(){
        //AdminProfile
        Route::get('profile',[AdminProfileController::class,'index'])->name('profile.index');
        Route::put('profile/update',[AdminProfileController::class,'updateProfile'])->name('profile.update');
        Route::put('profile-password/password',[AdminProfileController::class,'updatePassword'])->name('password.update');
    
        //Notification
        Route::put('notification',[ApplicationController::class,'seenNotification'])->name('notification');

        //createApplication
        Route::get('create-application',[ApplicationController::class,'createApplication'])->name('create-application');
        

        //NomadApplication
        Route::get('nomad-application-details/{id}', [NomadApplicationController::class, 'applicationDetails'])->name('nomad-application-details');
        Route::get('nomad-application',[NomadApplicationController::class,'index'])->name('nomad-application.index');
        Route::get('nomad-application/create',[NomadApplicationController::class,'create'])->name('nomad-application.create');
        Route::post('nomad-application',[NomadApplicationController::class,'store'])->name('nomad-application.store');
        Route::get('nomad-application-pdf',[ApplicationFunctionController::class,'nomadApplicationPdf'])->name('nomad-application.pdf');
    
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
    
    
        //ManageUser
        Route::put('manage-user/update-status',[ManageUserController::class,'changeStatus'])->name('manage-user.update-status');
        Route::get('manage-user',[ManageUserController::class,'index'])->name('manage-user.index');
        Route::get('manage-user/create',[ManageUserController::class,'create'])->name('manage-user.create');
        Route::post('manage-user',[ManageUserController::class,'store'])->name('manage-user.store');
        Route::delete('manage-user/destroy/{id}',[ManageUserController::class,'destroy'])->name('manage-user.destroy');
    
    
        //EmailConfiguration
        Route::get('email-configuration',[EmailConfigurationController::class,'index'])->name('email-config.index');
        Route::put('email-configuration',[EmailConfigurationController::class,'update'])->name('email-config.update');        
    });
});