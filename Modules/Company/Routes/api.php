<?php

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
    Route::apiResource('companies', 'Api\CompanyApiController');
    Route::post('companies/storeCardContact', 'Api\CompanyApiController@storeCardContact');
    Route::delete('companies/{cardId}', 'Api\CompanyApiController@destroy');
   // Route::delete('companies/{userId}/{cardId}/{groupId}', 'Api\CompanyApiController@destroy');
});
