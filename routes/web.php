<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\SessionAuth;


Route::get('/', fn() => redirect('/login'));

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth.session')->name('dashboard');
// Route::post('/books', [BookController::class, 'store'])->middleware('auth.session')->name('books.store');
// Route::get('/books', [BookController::class, 'index'])->middleware('auth.session')->name('books.index');

Route::middleware([SessionAuth::class])->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
});
