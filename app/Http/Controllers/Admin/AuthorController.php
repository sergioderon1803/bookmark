<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return Inertia::render('Admin/Authors/AuthorsIndex', [
            'authors' => $authors,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Authors/AuthorsCreate');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create($data);

        return redirect()->route('admin.authors.index')->with('success', 'Autor creado');
    }

    public function edit(Author $author)
    {
        return Inertia::render('Admin/Authors/AuthorsEdit', ['author' => $author]);
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($data);

        return redirect()->route('admin.authors.index')->with('success', 'Autor actualizado');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.authors.index')->with('success', 'Autor eliminado');
    }
}
