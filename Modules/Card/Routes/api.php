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
     Route::post('card_info/{id}', 'CardApiController@updateGeneraleInfo');

      // card update link
    Route::post('card_link/{id}', 'CardApiController@updateLink');


     // card update background and color
     Route::post('card_background/{id}', 'CardApiController@updateCardBackgroundAndColor');

      // card update app
    Route::post('card_app/{id}', 'CardApiController@updateCardApps');

   // Route::delete('cardOrder/{id}', 'CardOrderApiController@destroy');
});
