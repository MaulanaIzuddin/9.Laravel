<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorsController extends Controller
{
    public function index(){
        $authors = Authors::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "succes" => true,
                "message" => "Resource data not found!"
            ], 200);
        };

        return response()->json([
            "success" => true,
            "message" => "get all resources",
            "data" => $authors
        ], 200);
    }

    public function store (Request $request) {
        $validator = Validator::make ($request->all(),[
            'name' => 'required|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png',
            'bio' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'massage' => $validator->errors()
            ], 422);
        }

        $image = $request->file('photo');
        $image->store('authors', 'public');

        $authors = Authors::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio
        ]);

        return response()->json([
            'succes' => true,
            'massage' => 'Resource added succes!',
            'data' => $authors
        ], 201);
    }
}
