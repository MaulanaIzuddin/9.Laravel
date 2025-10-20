<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() {
        $books = Books::all();

        if ($books->isEmpty()) {
            return response()->json([
                "succes" => true,
                "message" => "Resource data not found!"
            ], 200);
        };

        return response()->json([
            "success" => true,
            "message" => "get all resources",
            "data" => $books
        ], 200);
    }
}
