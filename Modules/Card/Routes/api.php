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
    Route::apiResource('cards', 'Api\CardApiController');
    Route::post('cards/checkAvailability', 'Api\CardApiController@checkAvailability');
    Route::post('cards/updateReference', 'Api\CardApiController@updateReference');
    Route::put('cards/setMain/{id}', 'Api\CardApiController@setMainCard');
    Route::post('cards/store/user-card', 'Api\CardApiController@storeUserCompany');

    // Card Contact
    Route::apiResource('cardContacts', 'Api\CardContactApiController');

    // add card contact not registered
    Route::post('cardContacts/add_contact_not_registered', 'Api\CardApiController@saveContactNotRegistered');

    // card order
    Route::post('orders', 'Api\CardOrderApiController@store');

     // card update
     Route::post('cards/card_info/{card}', 'Api\CardApiController@updateGeneraleInfo');

      // card update link
    Route::post('cards/card_link/{card}', 'Api\CardApiController@updateLink');


     // card update background and color
     Route::post('cards/card_background/{card}', 'Api\CardApiController@updateCardBackgroundAndColor');

      // card update app
    Route::post('cards/card_app/{card}', 'Api\CardApiController@updateCardApps');

    // card duplicate
    Route::post('cards/duplicate/{card}', 'Api\CardApiController@duplicateCard');

    // share card
    Route::post('cards/share/{card}', 'Api\CardApiController@shareCard');

    // Route::delete('cardOrder/{id}', 'CardOrderApiController@destroy');

    // Shipping
    Route::apiResource('shipping', 'Api\ShippingApiController');
});
