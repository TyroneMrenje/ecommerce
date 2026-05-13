<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpiceController;

Route::get('/', [SpiceController::class, 'getAllSpice']);
Route::post('/category?search={category}', [SpiceController::class, 'searchbyCategory']);
Route::post('/{format}', [SpiceController::class, 'searchbyFormat']);
Route::get('/spice', [SpiceController::class, 'searchForSpice']);
Route::get('/spice/{id}',[SpiceController::class, 'getSpiceDetails']);
Route::fallback(function(){
    return redirect('/');
});

