<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::resource('plans', \Modules\Plan\Http\Controllers\PlansController::class)->middleware('permission:plans.manage');
    Route::post('features/save', 'PlanFeaturesController@update')
        ->name('features.save')
        ->middleware('permission:features.manage');
});
