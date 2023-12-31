<?php

use App\Http\Controllers\Admin\POSController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\WarehoseController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

// new inventory routes
Route::get('/inventory', function () { return view('inventory.dashboard'); });
Route::get('/categories', function () { return view('inventory.category.index'); }); 
Route::get('/sales/create', function () { return view('inventory.sale.create'); }); 
Route::get('/purchases', function () { return view('inventory.purchase.list'); });
Route::get('/purchases/create', function () { return view('inventory.purchase.create'); }); 
Route::get('/customers', function () { return view('inventory.people.customers'); }); 
Route::get('/suppliers', function () { return view('inventory.people.suppliers'); }); 

// RESOURCES
Route::resource('products', ProductController::class);
Route::resource('warehouse', WarehoseController::class);
Route::resource('pos', POSController::class);
Route::post('pos/update-invoice', [POSController::class, 'updateInvoice'])->name('pos.updateInvoice');
Route::resource('invoice', InvoiceController::class);
Route::get('inv/{invoice_code}', [InvoiceController::class, 'cetakInvoice'])->name('invoice.cetak');
