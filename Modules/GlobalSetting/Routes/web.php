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

use Modules\GlobalSetting\Http\Controllers\SettingContactController;

Route::prefix('globalsetting')->group(function() {
    Route::get('/', [SettingContactController::class, "index"]);
});

Route::get('/tested', [SettingContactController::class, "index"]);

Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::resource('settingContacts', SettingContactController::class)->middleware('permission:settingContacts.manage');

});
