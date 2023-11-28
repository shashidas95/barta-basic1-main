<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {

    return view('home');
});
// Route::get('/', function () {
//     $user = Auth::user();

//     return route('post.show');
// });

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.action');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
//profile routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'editProfile'])->name('editProfile');
    Route::post('/profile/update/{id}', [ProfileController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/post/create', [PostController::class, 'createPost'])->name('post.create');
    Route::post('/post', [PostController::class, 'storePost'])->name('post.store');
    Route::get('/posts/edit/{id}', [PostController::class, 'editPost'])->name('post.edit');
    Route::post('/posts/update/{id}', [PostController::class, 'updatePost'])->name('post.update');
    Route::match(['get', 'post'], '/posts/delete/{id}', [PostController::class, 'deletePost'])->name('post.delete');
});
Route::get('/posts', [PostController::class, 'showPosts'])->name('post.show');
Route::get('/post', [PostController::class, 'showPost'])->name('post.single-post');
