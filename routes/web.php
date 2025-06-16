<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controllers\LiveryController::class, 'index'])->name('home');
Route::get('catalogue', [Controllers\CatalogueController::class, 'index'])->name('catalogue');

Route::get('register', [Controllers\AuthController::class, 'register'])->name('register');
Route::post('register', [Controllers\AuthController::class, 'newUser'])->name('register.new-user');

Route::get('login', [Controllers\AuthController::class, 'login'])->name('login');
Route::post('authenticate', [Controllers\AuthController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [Controllers\AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('team', [Controllers\AdminController::class, 'team'])->name('admin.team');
    Route::get('livery', [Controllers\AdminController::class, 'livery'])->name('admin.livery');
    Route::get('invoice', [Controllers\AdminController::class, 'invoice'])->name('admin.invoice');
    Route::get('statistics', [Controllers\AdminController::class, 'statistics'])->name('admin.statistics');
});

Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('/', [Controllers\ProfileController::class, 'index'])->name('user-profile');
});
