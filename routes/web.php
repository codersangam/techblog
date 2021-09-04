<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialLinkController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{post}', [HomeController::class, 'singlepost'])->name('post');
Route::get('/post/category/{category}', [HomeController::class, 'postByCategory'])->name('category');
Route::get('/post/tag/{tag}', [HomeController::class, 'postByTag'])->name('tag');


// Tag
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/tag/list', [TagController::class, 'list']);
    Route::post('/tag/add', [TagController::class, 'add']);
    Route::get('/tag/edit/{id}', [TagController::class, 'edit']);
    Route::get('/tag/delete/{id}', [TagController::class, 'destroy']);
});
Route::post('edittag', [TagController::class, 'update'])->middleware(['auth:sanctum', 'verified']);

// Category
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/home', [AdminController::class, 'index']);
    Route::get('/category/list', [CategoryController::class, 'list']);
    Route::post('/category/add', [CategoryController::class, 'add']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);
});
Route::post('editcategory', [CategoryController::class, 'update'])->middleware(['auth:sanctum', 'verified']);

// Post
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/post/list', [PostController::class, 'list']);
    Route::get('/post/add', [PostController::class, 'add']);
    Route::post('/post/store', [PostController::class, 'store']);
    Route::get('/post/edit/{id}', [PostController::class, 'edit']);
    Route::get('/post/delete/{id}', [PostController::class, 'destroy']);
});
Route::post('editpost', [PostController::class, 'update'])->middleware(['auth:sanctum', 'verified']);

// Social Links
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/sociallinks/list', [SocialLinkController::class, 'list']);
    Route::post('/sociallinks/add', [SocialLinkController::class, 'add']);
    Route::get('/sociallinks/edit/{id}', [SocialLinkController::class, 'edit']);
    // Route::get('/post/delete/{id}', [SocialLinkController::class, 'destroy']);
});
Route::post('editlink', [SocialLinkController::class, 'update'])->middleware(['auth:sanctum', 'verified']);
