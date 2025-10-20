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
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $genres = Genres::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Resource added succes!',
            'data' => $genres
        ], 201);
    }

    public function show (string $id) {
        $genres = Genres::find($id);

        if (!$genres) {
            return response()->json([
                'success'=>false,
                'message'=>'Resource not found!'
            ], 404);
        }

        return response()->json([
            'success'=>true,
            'message'=>'Get detail resource',
            'data'=>$genres
        ], 200);
    }

    public function update (string $id, Request $request) {
        $genres = Genres::find($id);

        if (!$genres) {
            return response()->json([
                'success'=>false,
                'message'=>'Resource not found!'
            ], 404);
        }

        $validator = Validator::make ($request->all(),[
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $genres->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Resource updated succes!',
            'data' => $genres
        ], 200);
    }

    public function destroy (string $id) {
        $genres = Genres::find($id);

        if (!$genres) {
            return response()->json([
                'success'=>false,
                'message'=>'Resource not found!'
            ], 404);
        }

        $genres->delete();

        return response()->json([
            'success'=>true,
            'message'=>'Delete resource successfully'
        ], 200);
    }
}
