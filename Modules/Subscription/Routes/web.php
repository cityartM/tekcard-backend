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


use Modules\Subscription\Http\Controllers\SubscriptionController;

Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::resource('subscriptions', SubscriptionController::class)->middleware('permission:subscriptions.manage')->except(['show']);

});

Route::post('subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');

Route::get('subscriptions/download', [SubscriptionController::class, 'download'])->name('sub.download');
