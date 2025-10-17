<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() {
        $books = Books::all();

        return response()->json([
            "success" => true,
            "message" => "get all resources",
            "data" => $books
        ], 200);
    }
}
