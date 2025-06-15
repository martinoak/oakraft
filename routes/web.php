<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controllers\LiveryController::class, 'index'])->name('home');
Route::get('catalogue', [Controllers\CatalogueController::class, 'index'])->name('catalogue');

Route::prefix('admin')->group(function () {
    Route::get('/', [Controllers\AdminController::class, 'index'])->name('admin');
});
