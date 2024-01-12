<?php

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
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
});

Route::get('/', function () {
    return [
        'api'       => "Financial Budget - API",
        'status'    => "on line",
        'hash' => hash('sha256', rand(1, 100))
    ];
});

Route::middleware('api')->group(function () {
    Route::apiResources([
        'users'             => \App\Http\Controllers\UserController::class,
        'categories'        => \App\Http\Controllers\CategoryController::class,
        'types'             => \App\Http\Controllers\TypeController::class,
        'payment_methods'   => \App\Http\Controllers\PaymentMethodController::class,
        'movements'         => \App\Http\Controllers\MovementController::class
    ]);
});