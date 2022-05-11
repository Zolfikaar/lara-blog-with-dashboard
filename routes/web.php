<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;


Auth::routes();

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('category/{category_slug}', [FrontendController::class, 'viewCategory']);
Route::get('category/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);

// Comment Routes
Route::prefix('comment')->group(function () {
    Route::post('/', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
    Route::post('/update/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/delete/{id}', [CommentController::class, 'destroy'])->name('comment.delete');
});

// Backend Routes
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');

    // Categories Routes
    Route::get('/categories', [CategoryController::class,'index'])->name('admin.categories');
    Route::get('/category/create', [CategoryController::class,'create'])->name('admin.add-category');// to get the form
    Route::post('/category/create', [CategoryController::class,'store'])->name('admin.store-category');// to store the form
    Route::get('/category/edit/{id}', [CategoryController::class,'edit'])->name('admin.edit-category');
    Route::put('/category/update/{id}', [CategoryController::class,'update'])->name('admin.update-category');
    Route::delete('/category/delete/{id}', [CategoryController::class,'destroy'])->name('admin.delete-category');
    // Route::post('/category/delete', [CategoryController::class,'destroy'])->name('admin.delete-category');

    // Posts Routes
    Route::get('/posts', [PostController::class,'index'])->name('admin.posts');
    Route::get('/post/create', [PostController::class,'create'])->name('admin.add-post');
    Route::post('/post/create', [PostController::class,'store'])->name('admin.store-post');
    Route::get('/post/edit/{id}', [PostController::class,'edit'])->name('admin.edit-post');
    Route::put('/post/update/{id}', [PostController::class,'update'])->name('admin.update-post');
    Route::delete('/post/delete/{id}', [PostController::class,'destroy'])->name('admin.delete-post');

    // Users Routes
    Route::get('/users', [UserController::class,'index'])->name('admin.users');
    Route::get('/user/edit/{id}', [UserController::class,'edit'])->name('admin.edit-user');
    Route::put('/user/update/{id}', [UserController::class,'update'])->name('admin.update-user');
});
