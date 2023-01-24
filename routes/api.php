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

Route::get('/', function () {
    return [
        'api'       => "Financial Budget - API",
        'status'    => "on line"
    ];
});

Route::apiResources([
    'users'             => \App\Http\Controllers\UserController::class,
    'categories'        => \App\Http\Controllers\CategoryController::class,
    'types'             => \App\Http\Controllers\TypeController::class,
    'payment_methods'   => \App\Http\Controllers\PaymentMethodController::class
]);
