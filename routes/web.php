<?php

use App\Http\Controllers\PostController;
use App\Models\post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome',['posts'=> post::paginate(5)]);
})->name('home');

Route::get('/create',[PostController::class,'create'] );

Route::get('/edit/{id}',[PostController::class,'editdata'] )->name('edit');

Route::post('/update/{id}',[PostController::class,'updateData'] )->name('update');

Route::get('/delete/{id}',[PostController::class,'deleteData'] )->name('delete');

Route::post('/store',[PostController::class,'ourFileStore'])->name('store');

