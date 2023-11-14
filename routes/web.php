<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

//              method      view
// list ->      index     blogs.index
// single ->    show     blogs.show
// create ->   create   blogs.create
// store ->   store     -(db save -> redirect)
// edit ->    edit      blogs.edit
// update -> update - (db update -> redirect)
// destroy -> destroy - (db destroy -> redirect)

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs.index', [
        'blogs' => $category->blogs()->with('category', 'author')->paginate(),
    ]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs.index', [
        'blogs' => $user->blogs()->with('category', 'author')->paginate()
    ]);
});
