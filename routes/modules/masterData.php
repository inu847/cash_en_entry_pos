<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AskedQuestionsController;
use App\Http\Controllers\Admin\WhyShouldWeController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// RESOURCES
Route::resource('banner', BannerController::class);
Route::resource('askedQuestions', AskedQuestionsController::class);
Route::resource('payment', PaymentController::class);
Route::resource('whyShouldWe', WhyShouldWeController::class);
Route::resource('voucher', VoucherController::class);
Route::resource('ingredient', IngredientController::class);
Route::resource('generalSetting', GeneralSettingController::class);