<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Modules\CompanyGroups\Http\Controllers\CompanyGroupsApiController;

Route::group(['prefix' => 'companygroups', 'middleware' => 'auth'], function () {
    Route::get('/', [CompanyGroupsApiController::class, 'index']);
    Route::post('/', [CompanyGroupsApiController::class, 'store']);
    Route::get('/{id}', [CompanyGroupsApiController::class, 'show']);
    Route::post('/{id}', [CompanyGroupsApiController::class, 'update']);
    Route::delete('/{id}', [CompanyGroupsApiController::class, 'destroy']);
});