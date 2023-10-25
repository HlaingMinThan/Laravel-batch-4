<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    $blogs = Blog::all(); // array of objects
    return view('blogs', [
        'blogs' =>  $blogs
    ]);
});

Route::get('/blogs/{filename}', function ($filename) {
    $blog = Blog::find($filename); // string
    return view('blog-detail', [
        'blog' =>  $blog
    ]);
});
