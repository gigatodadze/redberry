<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Countries;
use \Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CountriesApiController;
use App\Http\Controllers\StatisticsApiController;
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

Route::get('countries',function (){
    return Countries::all();
});

Route::get('statistics',function (){
    return Countries::all();
});

Route::get('/countries', [CountriesApiController::class, 'index']);
Route::post('/countries', [CountriesApiController::class, 'store']);
Route::put('/countries/{countries}', [CountriesApiController::class, 'update']);
Route::delete('/countries/{countries}', [CountriesApiController::class, 'destroy']);

Route::get('/statistics', [StatisticsApiController::class, 'index']);
Route::post('/statistics', [StatisticsApiController::class, 'store']);
Route::put('/statistics/{statistics}', [StatisticsApiController::class, 'update']);
Route::delete('/statistics/{statistics}', [StatisticsApiController::class, 'destroy']);
