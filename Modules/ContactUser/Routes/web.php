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

Route::prefix('contactuser')->group(function() {
    Route::get('/', 'ContactUserController@index');
});

Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::resource('groups', GroupController::class)->middleware('permission:groups.manage');

});

Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::resource('remarks', RemarkController::class)->middleware('permission:remarks.manage');

});

//Route::post('groups', [GroupController::class, 'index'])->name('groups.index');