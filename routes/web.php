<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //conditional query
    $blogquery =  Blog::with('category', 'author')->latest();
    if (request('search')) {
        $blogquery->where('title', 'Like', '%' . request('search') . '%');
    }
    return view('blogs', [
        'blogs' => $blogquery->get()
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog-detail', [
        'blog' => $blog
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs' => $category->blogs->load('category', 'author')
    ]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        'blogs' => $user->blogs->load('category', 'author')
    ]);
});
