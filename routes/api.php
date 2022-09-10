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

Route::middleware('api.token')->group(function () {
    Route::post('register', [\App\Http\Controllers\Api\V1\AuthController::class, 'register']);

    Route::post('login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('get-me', [\App\Http\Controllers\Api\V1\AuthController::class, 'getMe']);
    });

});
