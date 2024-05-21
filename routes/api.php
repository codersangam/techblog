<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CountController;
use App\Http\Controllers\API\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Normal Routes
Route::get('posts', [PostController::class, 'index']);
Route::get('posts-with-pagination', [PostController::class, 'postsWithPagination']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('tags', [TagController::class, 'index']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('counts', [CountController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'postByCategory'])->name('category');
Route::get('/tag/{tag}', [TagController::class, 'postByTag'])->name('tag');


// Secure/Token Routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('add-tags', [TagController::class, 'addTags']);
    Route::post('update-tags', [TagController::class, 'updateTags']);
    Route::post('delete-tags/{id}', [TagController::class, 'deleteTags']);
    Route::post('add-categories', [CategoryController::class, 'addCategories']);
    Route::post('update-categories', [CategoryController::class, 'updateCategories']);
    Route::post('delete-categories/{id}', [CategoryController::class, 'deleteCategories']);
    Route::get('user-posts', [PostController::class, 'list']);
    Route::post('add-posts', [PostController::class, 'addPosts']);
    Route::post('update-posts', [PostController::class, 'updatePosts']);
    Route::post('delete-posts/{id}', [PostController::class, 'deletePosts']);
    Route::get('post/{id}', [PostController::class, 'postDetails']);
});


//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
