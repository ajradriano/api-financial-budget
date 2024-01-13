<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\TypeController;
use \App\Http\Controllers\PaymentMethodController;
use \App\Http\Controllers\MovementController;
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

Route::get('/', function () {
    return [
        'api'       => "Financial Budget - API",
        'status'    => "on line",
        'random'    => hash('sha256', rand(10, 100))
    ];
});

Route::group([
    'middleware'    => 'api',
    'prefix'        => 'auth'
], function ($router) {
    Route::post('login',    [AuthController::class, 'login']);
    Route::post('logout',   [AuthController::class, 'logout']);
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me',       [AuthController::class, 'me']);
});

Route::middleware('jwt.auth')->group(function () {
    Route::apiResources([
        'users'             => UserController::class,
        'categories'        => CategoryController::class,
        'types'             => TypeController::class,
        'payment_methods'   => PaymentMethodController::class,
        'movements'         => MovementController::class
    ]);
});

Route::middleware('user.type')->apiResource('users', UserController::class);