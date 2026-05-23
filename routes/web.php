<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request; 
use Inertia\Inertia;
use App\Http\Controllers\SpiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\loginController;


Route::get('/', [SpiceController::class, 'getAllSpice']);
Route::get('/spices/category', [SpiceController::class, 'searchbyCategory']);
Route::get('/spices/format', [SpiceController::class, 'searchbyFormat']);
Route::get('/spice', [SpiceController::class, 'searchForSpice']);
Route::get('/spices/not-found', [SpiceController::class, 'notFound']);
Route::get('/spice/details',[SpiceController::class, 'getSpiceDetails']);
Route::get('/user/register', function () {
    return Inertia::render('register');
});
Route::post('/user/register',[UserController::class,'userRegister'],)->middleware([HandlePrecognitiveRequests::class]);
Route::get('/user/login', function(){
    return Inertia::render('login');
});
Route::post('/user/login',[loginController::class, 'authenticate'])->middleware([HandlePrecognitiveRequests::class]);

Route::get('/email/verify', function () {
    return Inertia::render('emailverify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');