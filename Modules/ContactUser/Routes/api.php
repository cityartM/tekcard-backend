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
    Route::apiResource('remarks', 'Api\RemarkApiController');
    Route::apiResource('groups', 'Api\GroupApiController');
    Route::get('users/groups', 'Api\GroupApiController@groupUser');
    //Route::put('plans/reset', 'PlanApiController@reset');
});
