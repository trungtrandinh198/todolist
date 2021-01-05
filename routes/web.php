<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class,'index'])->middleware(['auth'])->name('list');
Route::get('/post/create', [PostController::class,'create'])->middleware(['auth'])->name('create');
Route::post('/post/create-post', [PostController::class,'createPost'])->middleware(['auth'])->name('create-post');
Route::get('/post/{id}/edit', [PostController::class,'edit'])->middleware(['auth'])->name('edit');
Route::post('/post/{id}/edit-post', [PostController::class,'editPost'])->middleware(['auth'])->name('edit-post');
Route::get('/post/{id}/delete', [PostController::class,'deletePost'])->middleware(['auth'])->name('delete');

require __DIR__.'/auth.php';
