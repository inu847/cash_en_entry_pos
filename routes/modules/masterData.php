<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AskedQuestionsController;
use Illuminate\Support\Facades\Route;

// RESOURCES
Route::resource('banner', BannerController::class);
Route::resource('askedQuestions', AskedQuestionsController::class);