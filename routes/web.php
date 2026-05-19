<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Inertia\Inertia;
use App\Http\Controllers\SpiceController;
use App\Http\Controllers\UserController;


Route::get('/', [SpiceController::class, 'getAllSpice']);
Route::get('/spices/category', [SpiceController::class, 'searchbyCategory']);
Route::get('/spices/format', [SpiceController::class, 'searchbyFormat']);
Route::get('/spice', [SpiceController::class, 'searchForSpice']);
Route::get('/spices/not-found', [SpiceController::class, 'notFound']);
Route::get('/spice/{id}',[SpiceController::class, 'getSpiceDetails']);
Route::get('/user/register', function () {
    return Inertia::render('register');
});
Route::post('/user/register',[UserController::class,'userRegister'],)->middleware([HandlePrecognitiveRequests::class]);
