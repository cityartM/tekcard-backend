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

Route::prefix('feedback')->group(function() {
    Route::get('/', 'FeedBackController@index');
});

Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::resource('feedback', \Modules\FeedBack\Http\Controllers\FeedBackController::class)->middleware('permission:feedback.manage');
   
}); 

Route::get('/feedback-home', [\Modules\FeedBack\Http\Controllers\FeedBackController::class, 'getPublishedFeedback'])->name('published-feedback');