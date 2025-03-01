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
    Route::resource('blogs', \Modules\Blog\Http\Controllers\BlogController::class)->middleware('permission:blogs.manage');

});

Route::get('/blogs/{id}', 'BlogController@show')->name('blogs.show');
Route::get('/blogsmain', 'BlogController@all')->name('blogs.all');