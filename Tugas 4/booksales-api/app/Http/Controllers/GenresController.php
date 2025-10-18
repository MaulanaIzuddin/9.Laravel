<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenresController extends Controller
{
    public function index() {
        $genres = Genres::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "succes" => true,
                "message" => "Resource data not found!"
            ], 200);
        };

        return response()->json([
            "success" => true,
            "message" => "get all resources",
            "data" => $genres
        ], 200);
    }

    public function store (Request $request) {
        $validator = Validator::make ($request->all(),[
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'massage' => $validator->errors()
            ], 422);
        }

        $genres = Genres::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'succes' => true,
            'massage' => 'Resource added succes!',
            'data' => $genres
        ], 201);
    }
}
