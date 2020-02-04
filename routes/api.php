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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::group(['middleware' => 'auth:api'],function(){

    Route::get('events','ApiController@events');
    Route::get('news','ApiController@news');
    Route::get('privileges','ApiController@privileges');
    Route::get('foundation','ApiController@foundation');
    Route::get('gallery','ApiController@gallery');

//});


Route::post('sign-up','ApiController@signUp');
Route::post('sign-in','ApiController@signIn');
