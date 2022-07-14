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


Route::group(['namespace' => 'Api\v1'], function () {
    // authentication
    Route::post('login', 'UserController@login');
    Route::post('reset_password', 'UserController@resetPassword');

     //Game Score
     Route::resource('score', 'GameScoreControlelr');
});

Route::namespace('Api\v1')->group(function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('logout', 'UserController@logout');
        Route::get('profile', 'Userontroller@profile');

        Route::post('approved_calendars/{id}', 'CalendarController@approvedCalendar')
            ->middleware('permission:update_calendar')->where('id', '[0-9]+');

        //Comment
        Route::resource('comment', 'CommentController');
    });
});

