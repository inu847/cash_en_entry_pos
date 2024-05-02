<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AskedQuestionsController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// RESOURCES
Route::resource('banner', BannerController::class);
Route::resource('askedQuestions', AskedQuestionsController::class);
Route::resource('payment', PaymentController::class);
