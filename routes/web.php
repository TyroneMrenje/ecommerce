<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpiceController;

Route::get('/', [SpiceController::class, 'getAllSpice']);
Route::get('/spices/category', [SpiceController::class, 'searchbyCategory']);
Route::get('/spices/format', [SpiceController::class, 'searchbyFormat']);
Route::get('/spice', [SpiceController::class, 'searchForSpice']);
Route::get('/spices/not-found', [SpiceController::class, 'notFound']);
Route::get('/spice/{id}',[SpiceController::class, 'getSpiceDetails']);
Route::fallback(function(){
    return redirect('/');
});

