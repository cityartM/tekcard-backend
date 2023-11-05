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

Route::prefix('aboutcard')->group(function() {
    Route::get('/', 'AboutCardController@index');
});


Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::resource('aboutCards', \Modules\AboutCard\Http\Controllers\AboutCardController::class)->middleware('permission:aboutCards.manage');

});