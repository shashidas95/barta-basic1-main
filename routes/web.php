<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/post/create', [PostController::class, 'createPost'])->name('post.create');
    Route::post('/posts', [PostController::class, 'storePost'])->name('post.store');
    Route::get('/posts/edit/{id}', [PostController::class, 'editPost'])->name('post.edit');
    Route::post('/posts/update/{id}', [PostController::class, 'updatePost'])->name('post.update');
    Route::match(['get', 'post'], '/posts/delete/{id}', [PostController::class, 'deletePost'])->name('post.delete');
});
Route::get('/posts', [PostController::class, 'showPosts'])->name('post.show');
Route::get('/post', [PostController::class, 'showPost'])->name('post.single-post');

require __DIR__ . '/auth.php';
