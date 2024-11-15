<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index()  {
        return new BookResource(Book::all());
    }

    function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_at' => 'required'
        ]);

        $book = Book::create($validated);

        return response()->json([
            'Message' => 'Book created successfully!',
            'data' => new BookResource($book)
        ], 201);
    }
}
