<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

// Route untuk profile
Route::get('/user/profile', [ProfileController::class, 'profile']);

// Route untuk halaman create user
Route::get('/user/create', [UserController::class, 'create']);

// Route untuk menyimpan user
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::resource('user', UserController::class);

Route::put('/user{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::get('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/user', [UserController::class, 'index'])->name('user.list');