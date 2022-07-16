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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'Api'], function () {
    // authentication
    Route::post('login', 'AuthController@login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('test', 'AuthController@user');
        Route::post('logout', 'UserController@logout');

        //Comment
        Route::resource('comment', 'CommentController');
        //Game Score
        Route::resource('score', 'GameScoreControlelr');


    });
    // Route::post('reset_password', 'UserController@resetPassword');
    // Route::get('logout', 'Auth\AuthController@logout');
});

