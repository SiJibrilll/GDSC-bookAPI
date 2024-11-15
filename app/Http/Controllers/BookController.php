<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    function index()  {
        return new BookResource(Book::all());
    }

    function find($id) {
        try {
            $book = Book::findOrFail($id);

            return new BookResource($book);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_at' => 'required'
        ]);

        $book = Book::create($validated);

        return response()->json([
            'message' => 'Book created successfully!',
            'data' => new BookResource($book)
        ], 201);
    }

    function put(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'sometimes',
            'author' => 'sometimes',
            'published_at' => 'sometimes'
        ]);

        try {
            $book = Book::findOrFail($id);
            $book->update($validated);            
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Book not found',
            ], 404);
        }
        
        return response()->json([
            'message' => 'Book edited successfully!',
            'data' => new BookResource($book)
        ]);
    }

    function delete($id) {
        try {
            $book = Book::findOrFail($id);
            $book->delete();            
        } catch (ModelNotFoundException $th) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json(['message'=>'Book deleted successfully']);
    }
}
