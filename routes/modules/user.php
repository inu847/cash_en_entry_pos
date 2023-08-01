<?php

use App\Http\Controllers\Admin\BussinessController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// new inventory routes
Route::get('/inventory', function () { return view('inventory.dashboard'); });
Route::get('/categories', function () { return view('inventory.category.index'); }); 
Route::get('/sales', function () { return view('inventory.sale.list'); });
Route::get('/sales/create', function () { return view('inventory.sale.create'); }); 
Route::get('/purchases', function () { return view('inventory.purchase.list'); });
Route::get('/purchases/create', function () { return view('inventory.purchase.create'); }); 
Route::get('/customers', function () { return view('inventory.people.customers'); }); 
Route::get('/suppliers', function () { return view('inventory.people.suppliers'); }); 

// RESOURCE
Route::resource('user', UserController::class);
Route::resource('bussiness', BussinessController::class);