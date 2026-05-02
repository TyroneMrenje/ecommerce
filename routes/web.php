<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpiceController;

Route::inertia('/', 'welcome')->name('home');
Route::get('/spices', [SpiceController::class, 'getAllSpice']);
