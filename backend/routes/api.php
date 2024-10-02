<?php

use App\Http\Controllers\AvailableDateController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ServiceTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('doctors', DoctorController::class);
Route::apiResource('service-types', ServiceTypeController::class);
Route::apiResource('available-dates', AvailableDateController::class);
