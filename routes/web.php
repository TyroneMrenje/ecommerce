<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpiceController;

Route::get('/', [SpiceController::class, 'getAllSpice']);
Route::post('/category?search={category}', [SpiceController::class, 'searchbyCategory']);
Route::post('/{format}', [SpiceController::class, 'searchbyFormat']);
Route::get('spice/{name}', [SpiceController::class, 'searchForSpice']);
Route::fallback(function(){
    return redirect('/');
});

