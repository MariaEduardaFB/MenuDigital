<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/sign-up', [AuthController::class, 'showRegisterForm']);

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);

Route::group(['prefix' => 'cardapio', 'middleware' => 'auth'], function () {
    Route::get('/', [CardapioController::class, 'index'])->name('cardapio.index');
    Route::get('/{cardapio}', [CardapioController::class, 'show'])->name('cardapio.show');
    Route::post('/store', [CardapioController::class, 'store'])->name('cardapio.store');
    Route::put('/{cardapio}/update', [CardapioController::class, 'update'])->name('cardapio.update');
    Route::delete('/{cardapio}/destroy', [CardapioController::class, 'destroy'])->name('cardapio.destroy');
});

Route::group(['prefix' => 'empresa', 'middleware' => 'auth'], function () {
    Route::get('/', [EmpresaController::class, 'index'])->name('empresa.index');
    Route::get('/{empresa}', [EmpresaController::class, 'show'])->name('empresa.show');
    Route::post('/store', [EmpresaController::class, 'store'])->name('empresa.store');
    Route::put('/{empresa}/update', [EmpresaController::class, 'update'])->name('empresa.update');
    Route::delete('/{empresa}/destroy', [EmpresaController::class, 'destroy'])->name('empresa.destroy');
});




