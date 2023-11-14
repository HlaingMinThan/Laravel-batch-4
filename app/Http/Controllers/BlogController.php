<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $filters = request(['category', 'search', 'author']);
        return view('blogs.index', [
            'blogs' => Blog::with('category', 'author')
                ->filter($filters)
                ->latest()
                ->paginate(3)
                ->withQueryString(),
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }
}
