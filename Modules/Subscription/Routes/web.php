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
    Route::resource('subscriptions', \Modules\Subscription\Http\Controllers\SubscriptionController::class)->middleware('permission:subscriptions.manage');
   
}); 

Route::post('subscriptions', '\Modules\Subscription\Http\Controllers\SubscriptionController@store')->name('subscriptions.store');