<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('blogs', [
        'blogs' =>  Blog::all()
    ]);
});

Route::get('/blogs/{filename}', function ($filename) {
    return view('blog-detail', [
        'blog' =>   Blog::find($filename)
    ]);
});
