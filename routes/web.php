<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostAuthorController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'check']);
Route::get('login', [AuthController::class, 'loginview'])->name('loginView');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('account', [AccountController::class, 'index'])->name('account.index');
    Route::get('account/create', [AccountController::class, 'create'])->name('account.create');
    Route::post('account', [AccountController::class, 'store'])->name('account.store');
    Route::get('account/{username}/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('account/{username}', [AccountController::class, 'update'])->name('account.update');
    Route::delete('account/{username}', [AccountController::class, 'destroy'])->name('account.destroy');

    // post route
    Route::get('post', [PostController::class, 'index'])->name('post.index');
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{idpost}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/{idpost}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/{idpost}', [PostController::class, 'destroy'])->name('post.destroy');

    // post author route
    Route::get('post-author', [PostAuthorController::class, 'index'])->name('post-author.index');
    Route::get('post-author/create', [PostAuthorController::class, 'create'])->name('post-author.create');
    Route::post('post-author', [PostAuthorController::class, 'store'])->name('post-author.store');
    Route::get('post-author/{idpost}/edit', [PostAuthorController::class, 'edit'])->name('post-author.edit');
    Route::put('post-author/{idpost}', [PostAuthorController::class, 'update'])->name('post-author.update');
    Route::delete('post-author/{idpost}', [PostAuthorController::class, 'destroy'])->name('post-author.destroy');



    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
