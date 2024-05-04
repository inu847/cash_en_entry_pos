<?php

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Route;

// new inventory routes
Route::get('/Employee', function () { return view('employee.dashboard'); });

// RESOURCES
Route::resource('employee', EmployeeController::class);
Route::resource('emPosition', EmployeeController::class);
Route::resource('emAttendance', EmployeeController::class);
Route::resource('emLevel', EmployeeController::class);
Route::resource('emLoan', EmployeeController::class);
Route::resource('emStatus', EmployeeController::class);
Route::resource('emSalary', EmployeeController::class);
Route::resource('emWorkingH', EmployeeController::class);
