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
    Route::resource('companies', \Modules\Company\Http\Controllers\CompanyController::class)->middleware('permission:companies.manage');
});

Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::resource('companiesList', \Modules\Company\Http\Controllers\CompanyListController::class)->middleware('permission:companies.manage');
});


Route::get('user/download', [\Modules\Company\Http\Controllers\CompanyController::class, 'download'])->name('user.download');