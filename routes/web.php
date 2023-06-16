<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth'])->group(function(){

Route::resource('Category', CategoryController::class);
Route::resource('Post', PostController::class);
});

Auth::routes();

Route::middleware(['admin'])->group(function(){
    Route::get('/dashbord', [AppController::class, 'dashbord'])->name('dashbord');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('detail-post/{id}', [AppController::class, 'detail_post'])->name('detail_post');
Route::post('add_comment', [CommentController::class, 'add_comment'])->name('add_comment');