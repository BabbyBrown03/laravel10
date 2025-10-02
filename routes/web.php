<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);

Route::get('/about', [PostController::class, 'name']);

Route::get('/image', function(){
    return view('image');
    });

Route::get('/buku',[BukuController::class,'index']);
Route::get('/buku/create',[BukuController::class,'create'])->name('buku.create');
Route::post('/buku',[BukuController::class,'store'])->name('buku.store');
Route::delete('/buku/{id}', [BukuController::class, 'destroy']) -> name('buku.destroy');

Route::get('buku/{id}', [BukuController::class, 'show'])->name('buku.show');


Route::get('/buku/{id}/edit', [BukuController::class, 'edit']) -> name('buku.edit');