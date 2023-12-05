<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth'], function () {
    // Card
    Route::apiResource('cards', 'CardApiController');
    Route::post('cards/checkAvailability', 'CardApiController@checkAvailability');
    Route::post('cards/updateReference', 'CardApiController@updateReference');
    Route::put('cards/setMain/{id}', 'CardApiController@setMainCard');
    Route::post('cards/store/user-card', 'CardApiController@storeUserCompany');

    // Card Contact
    Route::apiResource('cardContacts', 'CardContactApiController');

    // card order
    Route::post('orders', 'CardOrderApiController@store');

     // card update
     Route::put('cards/card_info/{card}', 'CardApiController@updateGeneraleInfo');

      // card update link
    Route::put('cards/card_link/{card}', 'CardApiController@updateLink');


     // card update background and color
     Route::put('cards/card_background/{card}', 'CardApiController@updateCardBackgroundAndColor');

      // card update app
    Route::put('cards/card_app/{card}', 'CardApiController@updateCardApps');

   // Route::delete('cardOrder/{id}', 'CardOrderApiController@destroy');
});
