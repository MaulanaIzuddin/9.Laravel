<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/genres', [GenresController::class, 'index']);
Route::get('/authors', [AuthorsController::class, 'index']);
Route::get('/books', [BooksController::class, 'index']);