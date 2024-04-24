<?php

use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Route;

// RESOURCES
Route::resource('banner', BannerController::class);
