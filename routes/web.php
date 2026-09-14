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
use App\Http\Controllers\CartController;


Route::get('/', [SpiceController::class, 'getAllSpice']);
Route::get('/spices/category', [SpiceController::class, 'searchbyCategory']);
Route::get('/spices/format', [SpiceController::class, 'searchbyFormat']);
Route::get('/spice', [SpiceController::class, 'searchForSpice']);
Route::get('/spices/not-found', [SpiceController::class, 'notFound']);
Route::get('/spice/{id}/{format}',[SpiceController::class, 'getSpiceDetails']);
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
})->middleware('auth','throttle:6,1')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/cart', [CartController::class, 'index']); 

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index']);   
    Route::post('/add', [CartController::class, 'add']); 

   
    Route::middleware('auth')->group(function () {
        Route::patch('/update', [CartController::class, 'update']);
        Route::delete('/remove', [CartController::class, 'remove']);
        Route::delete('/clear', [CartController::class, 'clear']);
    });
});
