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




Route::get('/getProperties/{id}', [\Modules\Categories\Http\Controllers\Api\CategoriesController::class,'getProperties']);

Route::middleware('auth:api')->get('/address', function (Request $request) {
    return $request->user();
});

Route::prefix('address')->group(function () {
    Route::get('/getCountries', [ApiAddressController::class,'getCountries']);
    Route::get('/getWilayas/{id}', [ApiAddressController::class, 'getWilayas']);
    Route::get('/getCities/{id}', [ApiAddressController::class, 'getCities']);
});
