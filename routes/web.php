<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
//              method      view
// list ->      index     blogs.index
// single ->    show     blogs.show
// create ->   create   blogs.create
// store ->   store     -(db save -> redirect)
// edit ->    edit      blogs.edit
// update -> update - (db update -> redirect)
// destroy -> destroy - (db destroy -> redirect)
