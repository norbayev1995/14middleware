<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('loginPage', [UserController::class, 'loginPage'])->name('loginPage');
    Route::get('registerPage', [UserController::class, 'registerPage'])->name('registerPage');
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('register', [UserController::class, 'register'])->name('register');
});
Route::get('editProfile', [UserController::class, 'editProfile'])->name('editProfile')->middleware('auth');
Route::put('updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

