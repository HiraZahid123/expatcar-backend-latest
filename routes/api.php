<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\BlogController;

Route::prefix('v1')->group(function () {
    // Car metadata
    Route::get('/years', [CarController::class, 'years']);
    Route::get('/makes', [CarController::class, 'makes']);
    Route::get('/models', [CarController::class, 'models']);
    Route::get('/variants', [CarController::class, 'variants']);
    Route::get('/search', [CarController::class, 'search']);
    Route::get('/makes/{slug}', [CarController::class, 'showMake']);
    Route::get('/makes/{makeSlug}/models/{modelSlug}', [CarController::class, 'showModel']);
    Route::get('/car-data/{slug}', [CarController::class, 'showBySlug']);

    // Bookings
    Route::post('/bookings', [BookingController::class, 'store']);

    // Blogs
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::get('/blogs/{slug}', [BlogController::class, 'show']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
