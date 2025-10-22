<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/authors', AuthorsController::class)->only('index', 'show');
Route::apiResource('/genres', GenresController::class)->only('index', 'show');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::get('/books', [BooksController::class, 'index']);

Route::middleware(['auth:api'])->group(function() {

    Route::middleware(['role:admin'])->group(function () {

        Route::apiResource('/authors', AuthorsController::class)->only('store', 'update', 'destroy');
        Route::apiResource('/genres', GenresController::class)->only('store', 'update', 'destroy');

    });
});
