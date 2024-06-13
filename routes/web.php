<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumCommentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('music')->group(function () {
    Route::post('/{music}/view', [MusicController::class, 'addView'])->name('music.add.view');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('music')->group(function () {
        Route::get('/', [MusicController::class, 'index'])->name('music.index');
        Route::post('/', [MusicController::class, 'store'])->name('music.store');
        Route::put('/', [MusicController::class, 'update'])->name('music.update');
        Route::delete('/{music}', [MusicController::class, 'destroy'])->name('music.destroy');
        Route::get('/{music}/download', [MusicController::class, 'download'])->name('music.download');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('profile.index');
        Route::put('/{user}', [UserController::class, 'update'])->name('profile.update');
        Route::put('/{user}/avatar', [UserController::class, 'changeAvatar'])->name('profile.change.avatar');
        Route::put('/{user}/password', [AuthController::class, 'changePassword'])->name('profile.change.password');
    });

    Route::prefix('forum')->group(function () {
        Route::get('/', [ForumController::class, 'index'])->name('forum.index');
        Route::get('/newpost', [ForumController::class, 'create'])->name('forum.create');
        Route::post('/newpost', [ForumController::class, 'store'])->name('forum.store');

        Route::get('details/{forum}', [ForumController::class, 'showdetails'])->name('forum.showdetails');       
        Route::get('details/{forum}/edit', [ForumController::class, 'edit'])->name('forum.edit');
        Route::put('details/{forum}', [ForumController::class, 'update'])->name('forum.update');        
        Route::delete('details/{forum}', [ForumController::class, 'destroy'])->name('forum.destroy');
        
        Route::put('details/{forum}/close', [ForumController::class, 'closepost'])->name('forum.closepost');
        Route::put('details/{forum}/open', [ForumController::class, 'openpost'])->name('forum.openpost');

        Route::post('details/{forum}/comment', [ForumCommentController::class, 'store'])->name('comment.store');
        Route::put('details/{forum}/comment/{comment}', [ForumCommentController::class, 'update'])->name('comment.update');
        Route::delete('details/{forum}/comment/{comment}', [ForumCommentController::class, 'destroy'])->name('comment.destroy');

        // Route::put('/{user}/avatar', [UserController::class, 'changeAvatar'])->name('profile.change.avatar');
        // Route::put('/{user}/password', [AuthController::class, 'changePassword'])->name('profile.change.password');
    });
});
