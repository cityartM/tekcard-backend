<?php

use Illuminate\Http\Request;
use Modules\Address\Http\Controllers\ApiAddressController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::prefix('address')->group(function () {
    Route::get('/countries', [ApiAddressController::class,'countries']);
    Route::get('/wilayas', [ApiAddressController::class, 'wilayas']);
    Route::get('/cities/{id}', [ApiAddressController::class, 'cities']);
});
