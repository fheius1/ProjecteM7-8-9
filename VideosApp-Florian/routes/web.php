<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersManageController;
use App\Http\Controllers\VideosManageController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VideosController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware(['auth', 'can:manage-videos'])->group(function () {
        Route::get('/videosmanage', [VideosManageController::class, 'index'])->name('videos.manage.index');
        Route::get('/videosmanage/create', [VideosManageController::class, 'create'])->name('videos.manage.create');
        Route::post('/videosmanage', [VideosManageController::class, 'store'])->name('videos.manage.store');
        Route::get('/videosmanage/{id}/edit', [VideosManageController::class, 'edit'])->name('videos.manage.edit');
        Route::put('/videosmanage/{id}', [VideosManageController::class, 'update'])->name('videos.manage.update');
        Route::delete('/videosmanage/{id}', [VideosManageController::class, 'destroy'])->name('videos.manage.destroy');
    });

    Route::middleware(['auth', 'can:admmistradorUsuaris'])->group(function () {
        Route::get('/users/manage', [UsersManageController::class, 'index'])->name('users.manage.index');
        Route::get('/users/manage/create', [UsersManageController::class, 'create'])->name('users.manage.create');
        Route::post('/users/manage', [UsersManageController::class, 'store'])->name('users.manage.store');
        Route::get('/users/manage/{id}/edit', [UsersManageController::class, 'edit'])->name('users.manage.edit');
        Route::put('/users/manage/{id}', [UsersManageController::class, 'update'])->name('users.manage.update');
        Route::delete('/users/manage/{id}', [UsersManageController::class, 'destroy'])->name('users.manage.destroy');
    });

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
});

Route::get('/videos', [VideosController::class, 'index'])->name('videos.index');
Route::get('/videos/{id}', [VideosController::class, 'show'])->name('videos.show');
