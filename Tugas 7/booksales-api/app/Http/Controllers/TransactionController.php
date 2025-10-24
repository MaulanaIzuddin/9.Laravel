<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::with('user', 'book')->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                "succes" => true,
                "message" => "Resource data not found!"
            ], 200);
        };

        return response()->json([
            "success" => true,
            "message" => "get all resources",
            "data" => $transactions
        ], 200);
    }

    public function show (string $id) {
        $transactions = Transaction::with('user', 'book')->find($id);

        if (!$transactions) {
            return response()->json([
                'success'=>false,
                'message'=>'Resource not found!'
            ], 404);
        }

        return response()->json([
            'success'=>true,
            'message'=>'Get detail resource',
            'data'=>$transactions
        ], 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $uniqueCode = "ORD-". strtoupper(uniqid());

        $user = auth('api')->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'UnAuthorized!'
            ], 401);
        }

        $book = Books::find($request->book_id);

        if ($book->stok < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup'
            ], 400);
        }

        $totalAmount = $book->price * $request->quantity;

        $book->stok -= $request->quantity;
        $book->save();

        $transactions = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            'success'=>true,
            'message'=>'Transaction created',
            'data'=>$transactions
        ], 201);
    }

    public function update(Request $request, string $id) {
    $transactions = Transaction::find($id);

    if (!$transactions) {
        return response()->json([
            'success' => false,
            'message' => 'Transaction not found!'
        ], 404);
    }

    $validator = Validator::make($request->all(), [
        'quantity' => 'required|integer|min:1'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => $validator->errors()
        ], 422);
    }

    $book = Books::find($transactions->book_id);
    if (!$book) {
        return response()->json([
            'success' => false,
            'message' => 'Book not found!'
        ], 404);
    }

    $book->stok += $transactions->total_amount / $book->price;

    if ($book->stok < $request->quantity) {
        return response()->json([
            'success' => false,
            'message' => 'Stok buku tidak cukup!'
        ], 400);
    }

    $book->stok -= $request->quantity;
    $book->save();

    $totalAmount = $book->price * $request->quantity;

    $transactions->update([
        'total_amount' => $totalAmount
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Transaction updated successfully',
        'data' => $transactions
    ], 200);
    }

    public function destroy(string $id) {
    $transactions = Transaction::find($id);

    if (!$transactions) {
        return response()->json([
            'success' => false,
            'message' => 'Transaction not found!'
        ], 404);
    }

    $book = Books::find($transactions->book_id);
    if ($book) {
        $book->stok += $transactions->total_amount / $book->price;
        $book->save();
    }

    $transactions->delete();

    return response()->json([
        'success' => true,
        'message' => 'Transaction deleted successfully'
    ], 200);
    }
}
