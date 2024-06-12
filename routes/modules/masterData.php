<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AskedQuestionsController;
use App\Http\Controllers\Admin\WhyShouldWeController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\MasterHolidayController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ManageTableController;
use App\Http\Controllers\Admin\StockInController;
use App\Http\Controllers\Admin\StockOutController;
use App\Http\Controllers\Admin\TransferInController;
use App\Http\Controllers\Admin\KatalogDetailsController;
use App\Http\Controllers\Admin\ProductInstructionController;
use App\Http\Controllers\Admin\KatalogController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/Masterdata', function () { return view('masterdata.dashboard'); });

// RESOURCES
Route::resource('banner', BannerController::class);
Route::resource('askedQuestions', AskedQuestionsController::class);
Route::resource('payment', PaymentController::class);
Route::resource('whyShouldWe', WhyShouldWeController::class);
Route::resource('voucher', VoucherController::class);
Route::resource('ingredient', IngredientController::class);
Route::resource('generalSetting', GeneralSettingController::class);
Route::resource('manageTable', ManageTableController::class);
Route::resource('stockIn', StockInController::class);
Route::resource('stockOut', StockOutController::class);
Route::resource('transferIn', TransferInController::class);
Route::resource('katalogDetails', KatalogDetailsController::class);
Route::resource('productInstruction', ProductInstructionController::class);
Route::resource('katalog', KatalogController::class);
Route::resource('masterHoliday', MasterHolidayController::class);