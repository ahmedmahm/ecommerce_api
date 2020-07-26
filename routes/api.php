<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');



});

Route::group([
    'middleware' => 'api',
], function(){
    /// Address Routing
    Route::get('addresses', 'Logic\AdressController@index');
    Route::get('addresses/{address}', 'Logic\AdressController@show');
    Route::post('addresses', 'Logic\AdressController@store');
    Route::put('addresses/{address}', 'Logic\AdressController@update');
    Route::delete('addresses/{address}', 'Logic\AdressController@destroy');
    /// End Of Address Routing

});

//Emails
Route::post('send','Mail\MailController@sendWelcomeMail');

//Auth
Route::get('/email/resend','VerificationController@resend')->name('verification.resend');
Route::get('/email/verify/{id}/{hash}','VerificationController@verify')->name('verification.verify');
