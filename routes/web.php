<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Middleware\MustBeAdminUser;
use App\Http\Middleware\MustBeAuthUser;
use Illuminate\Support\Facades\Route;

Route::middleware(MustBeAuthUser::class)->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');
    Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);
    Route::post('/blogs/{blog:slug}/handle-subscriptions', [SubscriptionController::class, 'toggle']);
    Route::post('/logout', [LogoutController::class, 'destroy']);
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit']);
    Route::patch('/comments/{comment}/update', [CommentController::class, 'update']);
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
});

Route::middleware(MustBeAdminUser::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminController::class, 'create']);
    Route::post('/admin/blogs/store', [AdminController::class, 'store']);
    Route::get('/admin/blogs/{blog}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/blogs/{blog}/update', [AdminController::class, 'update']);
    Route::delete('/admin/blogs/{blog}/destroy', [AdminController::class, 'destroy']);
});

Route::middleware('guest-user')->group(function () {
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});

//              method      view                        HTTP
// list ->      index     blogs.index                   GET
// single ->    show     blogs.show                     GET
// create ->   create   blogs.create                    GET
// store ->   store     -(db save -> redirect)          POST
// edit ->    edit      blogs.edit                      GET
// update -> update - (db update -> redirect)           PATCH/PUT
// destroy -> destroy - (db destroy -> redirect)        delete
