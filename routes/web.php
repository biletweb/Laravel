<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Post\Category\CategoryController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\SearchController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
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

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/category/{category_id}/posts/', [CategoryController::class, 'index'])->name('posts.category');

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [CreateController::class, 'create'])->name('posts.create');
Route::post('/posts', [StoreController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [ShowController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [EditController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post}', [UpdateController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [DestroyController::class, 'destroy'])->name('posts.destroy');

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
