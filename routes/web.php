<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs', [
        'blogs' => Blog::all()
    ]);
});

Route::get('/blogs/{slug}', function ($slug) {
    return view('blog-detail', [
        'blog' => Blog::where('slug', $slug)->first()
    ]);
});
