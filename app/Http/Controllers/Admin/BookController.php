<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->orderBy('id', 'desc')->get();
        $authors = Author::orderBy('name')->get();
        return Inertia::render('Admin/Books/BooksIndex', compact('books', 'authors'));
    }

    public function create()
    {
        $authors = Author::orderBy('name')->get();
        return Inertia::render('Admin/Books/BooksCreate', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'nullable|exists:authors,id',
            'published_year' => 'nullable|integer|min:1000|max:' . date('Y'),
        ]);

        Book::create($request->only('title', 'author_id', 'published_year'));

        return redirect()->route('admin.books.index')->with('success', 'Libro creado correctamente');
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('name')->get();
        // Cargar relación para evitar problema en el form
        $book->load('author');
        return Inertia::render('Admin/Books/BooksEdit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'nullable|exists:authors,id',
            'published_year' => 'nullable|integer|min:1000|max:' . date('Y'),
        ]);

        $book->update($request->only('title', 'author_id', 'published_year'));

        return redirect()->route('admin.books.index')->with('success', 'Libro actualizado correctamente');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Libro eliminado correctamente');
    }
}
