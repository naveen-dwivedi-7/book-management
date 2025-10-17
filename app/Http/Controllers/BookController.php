<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|digits:13|unique:books,isbn',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ], [
            'isbn.digits' => 'ISBN must be exactly 13 digits.',
            'isbn.unique' => 'This ISBN already exists in the system.'
        ]);

        Book::create($request->all());

        return back()->with('success', 'Book added successfully!');
    }


    public function index(Request $request)
    {
       $search = $request->query('search');

    $books = Book::query()
        ->when($search, function($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('isbn', 'like', "%{$search}%");
        })
        ->orderBy('id', 'asc')
        ->paginate(5);

    $books->appends($request->all());

    return view('books.index', compact('books'));
    }
}
