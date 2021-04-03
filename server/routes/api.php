<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ReviewController;



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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::resources([
        'users' => UserController::class,
        'missions' => MissionController::class,
        'reviews' => ReviewController::class
    ]);

    Route::post('user_detail', [AuthController::class, 'user_detail']);

    // Route::post('favorite/{post}', 'MissionController@favoritePost');
    // Route::post('unfavorite/{post}', 'MissionController@unFavoritePost');

    // Route::get('my_favorites', 'UsersController@myFavorites')->middleware('auth');
});
