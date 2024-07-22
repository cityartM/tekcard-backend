<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TranslationController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Users\UsersController;
use Illuminate\Support\Str;


Route::get('/lang/{locale}', function (string $locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang');

/**
 * Authentication
 */
Route::get('login', [LoginController::class,'show'])->name('login');
Route::post('login', [LoginController::class,'authenticate'])->name('login.authenticate');
Route::get('logout', [LoginController::class,'logout'])->name('auth.logout');
Route::post('front-logout', [LoginController::class,'frontLogout'])->name('auth.front.logout');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::group(['middleware' => ['registration', 'guest']], function () {
    Route::get('register', [RegisterController::class,'show'])->name('register');
    Route::post('register', [RegisterController::class,'register']);
    Route::post('registerFromCard', [RegisterController::class,'registerUserFromShareCard'])->name('register.share-card');
});

Route::group(['middleware' => ['password-reset', 'guest']], function () {
    Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
});

Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');

Route::group(['namespace' => 'Dashboard'],function (){
    /**
     * User Management
     */
    Route::resource('users', 'Users\UsersController')
        ->except('update');//->middleware('permission:users.manage');

    Route::group(['prefix' => 'users/{user}', 'middleware' => 'permission:users.manage'], function () {
        Route::put('update/details', 'Users\DetailsController@update')->name('users.update.details');
        Route::put('update/login-details', 'Users\LoginDetailsController@update')
            ->name('users.update.login-details');

        Route::post('update/avatar', 'Users\AvatarController@update')->name('user.update.avatar');
        Route::post('update/avatar/external', 'Users\AvatarController@updateExternal')
            ->name('user.update.avatar.external');


        Route::get('sessions', 'Users\SessionsController@index')
            ->name('user.sessions')->middleware('session.database');

        Route::delete('sessions/{session}/invalidate', 'Users\SessionsController@destroy')
            ->name('user.sessions.invalidate')->middleware('session.database');

    Route::delete('sessions/{session}/invalidate', 'Users\SessionsController@destroy')
        ->name('user.sessions.invalidate')->middleware('session.database');

    Route::post('two-factor/enable', 'TwoFactorController@enable')->name('user.two-factor.enable');
    Route::post('two-factor/disable', 'TwoFactorController@disable')->name('user.two-factor.disable');

    Route::get('/users', [UsersController::class, 'destroy'])->name('users.destroy');

        Route::post('two-factor/enable', 'TwoFactorController@enable')->name('user.two-factor.enable');
        Route::post('two-factor/disable', 'TwoFactorController@disable')->name('user.two-factor.disable');
    });

    /**
     * Roles & Permissions
     */
    Route::group(['namespace' => 'Authorization'], function () {
        Route::resource('roles', 'RolesController')->except('show')->middleware('permission:roles.manage');

        Route::post('permissions/save', 'RolePermissionsController@update')
            ->name('permissions.save')
            ->middleware('permission:permissions.manage');

        Route::resource('permissions', 'PermissionsController')->middleware('permission:permissions.manage');
    });

    /**
     * Settings
     */

    Route::get('settings', 'SettingsController@general')->name('settings.general')
        ->middleware('permission:settings.general');

    Route::post('settings/general', 'SettingsController@update')->name('settings.general.update')
        ->middleware('permission:settings.general');

    Route::get('settings/auth', 'SettingsController@auth')->name('settings.auth')
        ->middleware('permission:settings.auth');

    Route::post('settings/auth', 'SettingsController@update')->name('settings.auth.update')
        ->middleware('permission:settings.auth');

    if (config('services.authy.key')) {
        Route::post('settings/auth/2fa/enable', 'SettingsController@enableTwoFactor')
            ->name('settings.auth.2fa.enable')
            ->middleware('permission:settings.auth');

        Route::post('settings/auth/2fa/disable', 'SettingsController@disableTwoFactor')
            ->name('settings.auth.2fa.disable')
            ->middleware('permission:settings.auth');
    }

    Route::post('settings/auth/registration/captcha/enable', 'SettingsController@enableCaptcha')
        ->name('settings.registration.captcha.enable')
        ->middleware('permission:settings.auth');

    Route::post('settings/auth/registration/captcha/disable', 'SettingsController@disableCaptcha')
        ->name('settings.registration.captcha.disable')
        ->middleware('permission:settings.auth');

    Route::get('settings/notifications', 'SettingsController@notifications')
        ->name('settings.notifications')
        ->middleware('permission:settings.notifications');

    Route::post('settings/notifications', 'SettingsController@update')
        ->name('settings.notifications.update')
        ->middleware('permission:settings.notifications');





    /**
     * Activity Log
     */

    Route::get('activity', 'ActivityController@index')->name('activity.index')
        ->middleware('permission:users.activity');

    Route::get('activity/user/{user}/log', 'Users\ActivityController@index')->name('activity.user')
        ->middleware('permission:users.activity');

    Route::get('/test/{?lang}', function ($lang = null) {

        if (!isset($lang)) {
            $lang = 'en';
        }

        $locale = $lang;
        // $page_name = 'landing.json';
        // $page_path = resource_path('lang/' . $locale . '/pages/' . $page_name);

        $page_path = base_path('lang/' . $locale . '.json');
        $page_data = json_decode(file_get_contents($page_path), true);

        //dd($page_data);

        return view('welcome', [
            'sections' => $page_data
        ] );
    });


    Route::get('/translation', function () {
        return view('translation/index');
    });

    Route::get('/translations/{lang?}', [TranslationController::class, 'index'])->name('translations');

    Route::post('/translations/{lang}', [TranslationController::class, 'update'])->name('translations.store');

    Route::post('/translations/{lang}/images', [TranslationController::class, 'updateImages'])->name('translations.images');

    Route::get('/translation/add', function () {
        return view('translation/add');
    })->name('translation.add');

    Route::delete('/media/{media}', [TranslationController::class, 'deleteImage'])
        ->name('media.destroy');

    Route::post('/media/{lang}/{collection}', [TranslationController::class, 'addMedia'])
        ->name('media.store');

    route::get('/send-email', function () {
        $user = \App\Models\User::find(1);
        $password = Str::random(8);
        Mail::to('daoudbelmerabet@gmail.com')->send(new \App\Mail\UserRegistered($user,$password));
    })->name('send-email');
});

require __DIR__.'/frontend.php';


