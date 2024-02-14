<?php

use Illuminate\Http\Request;
use Modules\Company\Http\Controllers\CompanyApiController;

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


Route::get('company_list', 'CompanyApiController@index');
