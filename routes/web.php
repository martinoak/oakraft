<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controllers\HomepageController::class, 'index'])->name('home');
Route::get('download', [Controllers\HomepageController::class, 'download'])->name('livery.download');

Route::resource('livery', Controllers\LiveryController::class)->only(['show'])->names('livery');
Route::resource('airlines', Controllers\AirlinesController::class)->only(['index', 'show'])->names('airlines');

Route::get('catalogue', [Controllers\CatalogueController::class, 'index'])->name('catalogue');

Route::get('register', [Controllers\AuthController::class, 'register'])->name('register');
Route::post('register', [Controllers\AuthController::class, 'newUser'])->name('register.new-user');

Route::get('login', [Controllers\AuthController::class, 'login'])->name('login');
Route::post('authenticate', [Controllers\AuthController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [Controllers\AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('team', Controllers\Admin\TeamController::class,)->names('admin.team');
    Route::resource('liveries', Controllers\Admin\LiveryController::class)->names('admin.liveries');
    Route::resource('invoices', Controllers\Admin\InvoiceController::class)->names('admin.invoices');
    Route::get('stats', [Controllers\Admin\AdminController::class, 'stats'])->name('admin.stats');
});

Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('/', [Controllers\ProfileController::class, 'index'])->name('user-profile');
});
