<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\SwipeController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', fn() => redirect()->route('works.index', 'book'));

    Route::prefix('works/{type}')->whereIn('type', ['book','movie','game'])->group(function () {
        Route::get('/', [WorkController::class, 'index'])->name('works.index');
        Route::get('/wishlist', [WorkController::class, 'wishlist'])->name('works.wishlist');
    });

    Route::post('/swipes', [SwipeController::class, 'store'])->name('swipes.store');
});
