<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Country;
use \Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CountryApiController;
use App\Http\Controllers\StatisticApiController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/countries', [CountryApiController::class, 'index']);
    Route::post('/countries', [CountryApiController::class, 'store']);
    Route::put('/countries/{countries}', [CountryApiController::class, 'update']);
    Route::delete('/countries/{countries}', [CountryApiController::class, 'destroy']);

    Route::get('/statistics', [StatisticApiController::class, 'index']);
    Route::post('/statistics', [StatisticApiController::class, 'store']);
    Route::put('/statistics/{statistics}', [StatisticApiController::class, 'update']);
    Route::delete('/statistics/{statistics}', [StatisticApiController::class, 'destroy']);

});

Route::post("login", [UserController::class, 'index']);
Route::post("register", [UserController::class, 'register']);
