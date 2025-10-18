<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/authors', [AuthorsController::class, 'index']);
Route::post('/authors', [AuthorsController::class, 'store']);


Route::get('/books', [BooksController::class, 'index']);


Route::get('/genres', [GenresController::class, 'index']);
Route::post('/genres', [GenresController::class, 'store']);