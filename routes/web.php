<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpiceController;

Route::get('/', [SpiceController::class, 'getAllSpice']);
Route::post('/{category}', [SpiceController::class, 'searchbyCategory']);
Route::post('/{format}', [SpiceController::class, 'searchbyFormat']);
