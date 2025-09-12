<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);

Route::get('/about', [PostController::class, 'name']);

Route::get('/image', function(){
    return view('image');
});