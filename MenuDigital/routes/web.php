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

Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function () {
    Route::get('/', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/store', [PostsController::class, 'store'])->name('posts.store');
    Route::put('/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::delete('/{post}/destroy', [PostsController::class, 'destroy'])->name('posts.destroy');
});
