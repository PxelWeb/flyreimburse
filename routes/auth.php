<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ApplicationFunctionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //             ->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::group(['middleware'=>['auth','role:admin,agency']],function(){

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
    // Route::get('verify-email', EmailVerificationPromptController::class)
    //             ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //             ->middleware(['signed', 'throttle:6,1'])
    //             ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //             ->middleware('throttle:6,1')
    //             ->name('verification.send');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //             ->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');


    //generateAuthorizePdf
    Route::get('pdf/download',[ApplicationFunctionController::class,'pdfDownload'])->name('pdf.download');

    //Dowloand image
    Route::get('download',[ApplicationFunctionController::class,'download'])->name('download.file');
    
    //Excel Export
    Route::get('excel/all-application',[ApplicationFunctionController::class,'excel'])->name('excel.all-application');
    Route::get('excel/completed',[ApplicationFunctionController::class,'completedExcel'])->name('excel.completed');
    Route::get('excel/delivered',[ApplicationFunctionController::class,'deliveredExcel'])->name('excel.delivered');
    Route::get('excel/in-pay-process',[ApplicationFunctionController::class,'inPayProcessExcel'])->name('excel.in-pay-process');
    Route::get('excel/new-arrival',[ApplicationFunctionController::class,'newArrivalExcel'])->name('excel.new-arrival');
    Route::get('excel/refused',[ApplicationFunctionController::class,'refusedExcel'])->name('excel.refused');
    Route::get('excel/nomad-application',[ApplicationFunctionController::class,'nomadApplicationExcel'])->name('excel.nomad-application');
});
