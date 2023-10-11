<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', 'Auth\AuthController@token');
Route::get('check', 'Auth\AuthController@existUser');
Route::post('check-otp', 'Auth\RegistrationController@checkOtp');
Route::post('register', 'Auth\RegistrationController@index')->middleware('registration');
Route::post('logout', 'Auth\AuthController@logout');
Route::post('/login/social', 'Auth\SocialLoginController@authenticateWithSocialMedia');

Route::group(['middleware' => ['guest', 'password-reset']], function () {
    Route::post('password/remind', 'Auth\Password\RemindController@index');
    Route::post('password/reset', 'Auth\Password\ResetController@index');
});

//password reset
//Route::post('PasswordReset', 'Auth\Password\ResetPasswordController@checkEmailAndSendLink');


Route::group(['middleware' => 'auth'], function () {
    /*** Profile ***/
    
    Route::delete('user/delete', 'Auth\RegistrationController@destroy');

    Route::group(['namespace' => 'Profile'], function () {
        Route::get('me', 'DetailsController@index');
        Route::patch('me/details', 'DetailsController@update');
        Route::patch('me/details/auth', 'AuthDetailsController@update');
        Route::post('me/avatar', 'AvatarController@update');
        Route::delete('me/avatar', 'AvatarController@destroy');
        Route::put('me/avatar/external', 'AvatarController@updateExternal');
        
    });

    /***General Setting***/
    Route::get('general_settings', 'ApiSettingsController@general');
});



Route::get('test', function (Request $request) {
    return response()->json([
        'success' => true,
        'message' => 'test',
        'result' => \App\Helpers\Helper::checkApiLanguage()
    ]);
});

