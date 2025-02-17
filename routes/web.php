<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('registerPage');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});
Route::get('editProfile', [AuthController::class, 'editProfile'])->name('editProfile')->middleware('auth');
Route::put('updateProfile', [AuthController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

