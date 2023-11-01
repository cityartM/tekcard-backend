<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth'], function () {
    Route::apiResource('plans', 'PlanApiController');
    Route::post('purchase/client/{plan}', 'UserPlanApiController@storeClient')->name('purchase.client');
    Route::post('purchase/company/{plan}', 'UserPlanApiController@storeCompany')->name('purchase.company');
});
