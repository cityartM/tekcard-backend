<?php

use Illuminate\Support\Facades\Route;


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

Route::group([], function () {
    Route::resource('page', PageController::class)->names('page');
});

Route::prefix(LaravelLocalization::setLocale().'/dashboard')->group(function(){
    Route::resource('pages', \Modules\Page\Http\Controllers\PageController::class)->middleware('permission:pages.manage');

});