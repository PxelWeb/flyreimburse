<?php

use App\Http\Controllers\Frontend\UserApplicationController;
use Illuminate\Support\Facades\Route;
use App\Models\EmailConfiguration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use function Pest\Laravel\get;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//CreateApplication2
// Route::get('application',[UserApplicationController::class,'create'])->name('create');
Route::domain('app.flyreimburse.com')->group(function () {


    Route::get('/', [UserApplicationController::class, 'form1'])->name('form1');
    Route::post('application', [UserApplicationController::class, 'store'])->name('store');
    Route::get('terms-and-conditions',[UserApplicationController::class,'termsAndConditions'])->name('terms-and-conditions');
    Route::get('privacy-policy',[UserApplicationController::class,'privacyPolicy'])->name('privacy-policy');
    require __DIR__.'/auth.php';
});
