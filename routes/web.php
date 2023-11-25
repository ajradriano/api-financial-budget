<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::redirect('/', '/home');


Route::get('/home', function () {
    return view('home');
});

Route::get('/movimentacoes', function () {
    $response = app(MovementController::class)->index();
    return view('movements')->with('data', json_decode($response->getContent(), true));
})->name('movimentacoes');

Route::get('/movimentacoes/cadastro/{id?}', [MovementController::class, 'cadastro'])->name('movimentacoes.cadastro');

Route::get('/categorias', function () {
    $response = app(CategoryController::class)->index();
    return view('categories')->with('data', json_decode($response->getContent(), true));
})->name('categorias');

Route::get('/metodos-pagamento', function () {
    $response = app(PaymentMethodController::class)->index();
    return view('payment-methods')->with('data', json_decode($response->getContent(), true));
})->name('metodos-pagamento');

Route::get('/tipos-movimentacao', function () {
    $response = app(TypeController::class)->index();
    return view('movement-types')->with('data', json_decode($response->getContent(), true));
})->name('tipos-movimentacao');

Route::get('/usuarios', function () {
    $response = app(UserController::class)->index();
    return view('users')->with('data', json_decode($response->getContent(), true));
})->name('usuarios');
