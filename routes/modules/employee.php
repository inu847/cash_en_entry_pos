<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\EmAttendanceController;
use App\Http\Controllers\Employee\EmLevelController;
use App\Http\Controllers\Employee\EmLoanController;
use App\Http\Controllers\Employee\EmPositionController;
use App\Http\Controllers\Employee\EmSalaryController;
use App\Http\Controllers\Employee\EmStatusController;
use App\Http\Controllers\Employee\EmWorkingHoursController;
use Illuminate\Support\Facades\Route;

// new inventory routes
Route::get('/Employee', function () { return view('employee.dashboard'); });

// RESOURCES
Route::resource('employee', EmployeeController::class);
Route::resource('emPosition', EmPositionController::class);
Route::resource('emAttendance', EmAttendanceController::class);
Route::resource('emLevel', EmLevelController::class);
Route::resource('emLoan', EmLoanController::class);
Route::resource('emStatus', EmStatusController::class);
Route::resource('emSalary', EmSalaryController::class);
Route::resource('emWorkingH', EmWorkingHoursController::class);
Route::get('/repaymentpdf/pdf', [EmLoanController::class, 'createPDF']);