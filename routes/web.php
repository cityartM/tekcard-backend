<?php

use App\Helpers\Helper;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TranslationController;
use App\Models\Translation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Users\UsersController;
use \Imdhemy\Purchases\Facades\Product;


Route::get('/lang/{locale}', function (string $locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang');

Route::get('/lang/{locale}', function (string $locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang');


Route::get('/', function () {
    $locale = app()->getLocale();

    $translation = Translation::where('locale', $locale)->first();

    return view('home', [
        'translation' => $translation,
    ]);
})->name('home');

/**
 * Authentication
 */
Route::get('login', [LoginController::class,'show'])->name('login');
Route::post('login', [LoginController::class,'authenticate']);
Route::get('logout', [LoginController::class,'logout'])->name('auth.logout');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::group(['middleware' => ['registration', 'guest']], function () {
    Route::get('register', [RegisterController::class,'show'])->name('register');
    Route::post('register', [RegisterController::class,'register']);
});

Route::group(['middleware' => ['password-reset', 'guest']], function () {
    Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
});

/*Route::namespace(null)->group(function () {
    Route::get('password/reset/{token}', [\App\Http\Controllers\Dashboard\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
});*/




Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');
/*Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');
});*/


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
});



Route::get('/users_with_time_zone', function () {
   $timezones = \App\Models\User::distinct()->get(['timezone'])->toArray();
   //dd($timezones);
   $times=[];

   foreach ($timezones as $timezone) {
       $timezoneFormat = \Carbon\Carbon::now($timezone['timezone'])->format('H:i');
       $startTime = Carbon::createFromFormat('H:i', '08:00');
       $time = Carbon::createFromFormat('H:i', $timezoneFormat);
       if($time->gte($startTime)) {
           $times[$timezone['timezone']] = \Carbon\Carbon::now($timezone['timezone'])->format('H:i');
       }

   }
    $desired_keys = array_keys($times);

    /*$desired_keys = array_filter($times, function($value, $key) {
        return preg_match('/^(08:|1\d:|2[0-3]:)/', $value);
    }, ARRAY_FILTER_USE_BOTH);*/
    $messaging = app('firebase.messaging');

    // send message to user in test plan
    $usersTestPlan =\App\Models\User::query()->whereHas('plans', function ($query) use($desired_keys) {
        $query->where('start_date', '>=', Carbon::now()->subDays(setting('free_days')))
              ->whereIn('timezone', $desired_keys)
              ->latest();
    });

   // dd($usersTestPlan->get());

    $usersTestPlan->whereDoesntHave('subscription')->chunk(2, function ($chunkedUsers) use ($messaging) {
        $users = $chunkedUsers->groupBy('lang');
        foreach ($users as $key => $user) {
            $deviceToken = $user->pluck('device_token')->toArray();
            Log::info($deviceToken);
            $message = \Kreait\Firebase\Messaging\CloudMessage::fromArray([
                'token' => '',
                'notification' => [
                    'title' => Helper::translate($key, 'Reminder'),
                    'body' => Helper::translate($key, 'It s time to take your cigarettes')
                ],
                'data' => [],
            ]);
            $messaging->sendMulticast($message,$deviceToken);;
        }
    });
    dd('salam');
    $users =\App\Models\User::query()->whereHas('plans', function ($query) use($desired_keys) {
        $query->where('start_date', '>', Carbon::now()->subDays(30))
            //->whereIn('timezone', $desired_keys)
            ->latest();
    });
    dd($users->get());
     $users->whereHas('subscription', function ($query) use ($desired_keys) {
        $query->whereIn('timezone', $desired_keys);
    })->chunk(2, function ($chunkedUsers) use ($messaging) {
        $users = $chunkedUsers->groupBy('lang');
        foreach ($users as $key => $user) {
            $deviceToken = $user->pluck('device_token')->toArray();
            Log::info($deviceToken);
            $message = \Kreait\Firebase\Messaging\CloudMessage::fromArray([
                'token' => '',
                'notification' => [
                    'title' => Helper::translate($key, 'Reminder'),
                    'body' => Helper::translate($key, 'It s time to take your cigarettes')
                ],
                'data' => [],
            ]);
            $messaging->sendMulticast($message,$deviceToken);;
        }
        //Log::info($chunkedUsers->groupBy('lang'));
    });




    //'cgsvenjnQ4GyKOxubbv1hp:APA91bGBd8EespFkfmkEEQJFJ0Z3T9TPlGIjOIW35r4yNvM-u15Zg8_neRLPFlUswN7q7xHWO8FmffTdpCLSh7KPkvmTzeRpIi8xuu_NerK3KhuPEANX2qIsMBsGilFEc2fO2S90hOSM'

});

Route::get('/googleProductPurchase', function () {
    $purchaseToken='kifglbabihegcnbhejnlfcco.AO-J1OxMSCIO8uGEPJr9i66bNsVhgGD8yVqhUVFkHay4R6vZ8CgnbmNfP0DPAtyN56VC7EnIoocj29JFItaiKAblXWAbGTxCsg';
    $itemId='premium_sub';
    try {
        $subscriptionReceipt = Product::googlePlay()->packageName('com.cityart.gratuito')->id($itemId)->token($purchaseToken)->get();
        $date = \Carbon\Carbon::createFromTimestamp($subscriptionReceipt->getpurchaseTimeMillis() / 1000);
        $formattedDate = $date->format('Y-m-d H:i:s');
        var_dump($subscriptionReceipt->getOrderId());
        var_dump($formattedDate);
    } catch (\Exception $e) {
        // Define the regular expression pattern
        $pattern = '/"message": "(.*?)"/';

       // Perform the regular expression match
        if (preg_match($pattern, $e->getMessage(), $matches)) {
            $error_message = $matches[1];
        }
       // Print or use the error message
        if ($error_message) {
            echo "Error message: " . $error_message;
        } else {
            echo "Error message not found";
        }
       // var_dump($e->getMessage());
        dd('aa');
    }
    dd($subscriptionReceipt);
    return view('welcome');
});

Route::get('/appleProductPurchase', function () {
    //$receipt = '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';
    $receipt = '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';
    try {
        $receiptResponse = Product::appStore()->receiptData($receipt)->verifyReceipt();
    }catch (\Exception $e) {
        dd($e->getMessage());
    }
   // $receiptResponse = Product::appStore()->receiptData($receipt)->verifyReceipt();
    dd($receiptResponse);
    $receiptInfo =$receiptResponse->getLatestReceiptInfo();
    //dd($receiptInfo[0]->getPurchaseDate()->toDateTime()->format('Y-m-d H:i:s'));

    dd($receiptInfo[0]->getProductId(), $receiptInfo[0]->getTransactionId(),$receiptInfo[0]->getPurchaseDate()->toDateTime()->format('Y-m-d H:i:s'));

// Check the values of the response to verify transactions as needed.
    $receipt = $receiptResponse->getReceipt();
    $inAppList = $receipt->getInApp(); // contains all purchased products
});

require __DIR__.'/frontend.php';
