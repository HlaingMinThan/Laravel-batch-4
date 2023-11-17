<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\MustBeAuthUser;
use Illuminate\Support\Facades\Route;

Route::middleware(MustBeAuthUser::class)->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
    Route::post('/logout', [LogoutController::class, 'destroy']);
});

Route::middleware('guest-user')->group(function () {
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});
//              method      view
// list ->      index     blogs.index
// single ->    show     blogs.show
// create ->   create   blogs.create
// store ->   store     -(db save -> redirect)
// edit ->    edit      blogs.edit
// update -> update - (db update -> redirect)
// destroy -> destroy - (db destroy -> redirect)
