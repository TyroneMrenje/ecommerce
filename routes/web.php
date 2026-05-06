<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpiceController;

Route::get('/', [SpiceController::class, 'getAllSpice']);
