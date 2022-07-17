<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameScoreController;
use App\Http\Controllers\CommentController;


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
    
});

Route::get('/list', [UserController::class, 'index']);

Route::prefix('v1')->group(function () {
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('/auth/logout', [UserController::class, 'logout']);
        Route::get('user/{id}', [UserController::class, 'show']);
        Route::get('list', [UserController::class, 'index']);
        Route::put('/update/{id}', [UserController::class, 'update']);
        Route::delete('/delete/{id}', [UserController::class, 'destroy']);

        Route::prefix('comment')->group(function () {
            Route::get('', [CommentController::class, 'getComments']);
            Route::post('', [CommentController::class, 'addComment']);
            Route::delete('delete', [CommentController::class, 'deleteComment']);
        });

        //Game Score
        // Route::resource('score', 'GameScoreController');
        Route::get('rank/list', [GameScoreController::class, 'index']);
        
    });
});