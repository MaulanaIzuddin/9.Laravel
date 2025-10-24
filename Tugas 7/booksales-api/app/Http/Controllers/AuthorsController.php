<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
                'success' => false,
                'message' => $validator->errors()
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
            'success' => true,
            'message' => 'Resource added succes!',
            'data' => $authors
        ], 201);
    }

    public function show (string $id) {
        $authors = Authors::find($id);

        if (!$authors) {
            return response()->json([
                'success'=>false,
                'message'=>'Resource not found!'
            ], 404);
        }

        return response()->json([
            'success'=>true,
            'message'=>'Get detail resource',
            'data'=>$authors
        ], 200);
    }

    public function update (string $id, Request $request) {
        $authors = Authors::find($id);

        if (!$authors) {
            return response()->json([
                'success'=>false,
                'message'=>'Resource not found!'
            ], 404);
        }

        $validator = Validator::make ($request->all(),[
            'name' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png',
            'bio' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'bio' => $request->bio
        ];

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->store('authors', 'public');

            if ($authors->photo) {
                Storage::disk('public')->delete('authors/'. $authors->photo);
            }

            $data['photo'] = $image->hashName();
        }

        $authors->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Resource updated succes!',
            'data' => $authors
        ], 200);
    }

    public function destroy (string $id) {
        $authors = Authors::find($id);

        if (!$authors) {
            return response()->json([
                'success'=>false,
                'message'=>'Resource not found!'
            ], 404);
        }

        if ($authors->photo) {
            Storage::disk('public')->delete('authors/'. $authors->photo);
        }
        $authors->delete();

        return response()->json([
            'success'=>true,
            'message'=>'Delete resource successfully'
        ], 200);
    }
}
