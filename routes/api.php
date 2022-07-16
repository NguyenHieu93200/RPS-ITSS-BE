<?php

use App\Http\Controllers\UserController;
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


Route::prefix('v1')->group(function () {
    Route::post('/auth/register', [UserController::class, 'register']);
    Route::post('/auth/login', [UserController::class, 'login']);
    //     Game Score
//     Route::resource('score', 'GameScoreController');
});

Route::prefix('v1')->group(function () {
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('/auth/logout', [UserController::class, 'logout']);
        Route::get('profile', [UserController::class, 'profile']);

//        Route::post('approved_calendars/{id}', 'CalendarController@approvedCalendar')
//            ->middleware('permission:update_calendar')->where('id', '[0-9]+');

        //Comment
//        Route::resource('comment', 'CommentController');
    });
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::prefix('v1')->group(function () {
        Route::post('/auth/logout', [UserController::class, 'logout']);
        Route::get('profile', [UserController::class, 'profile']);

//        Route::post('approved_calendars/{id}', 'CalendarController@approvedCalendar')
//            ->middleware('permission:update_calendar')->where('id', '[0-9]+');

        //Comment
//        Route::resource('comment', 'CommentController');
    });
});

