<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', function () {
        return view('pages.register');
    })->name('register.page');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('music')->group(function () {
        Route::get('/', [MusicController::class, 'index'])->name('music.index');
        Route::post('/', [MusicController::class, 'store'])->name('music.store');
        Route::post('/{music}/view', [MusicController::class, 'addView'])->name('music.add.view');
    });
});
