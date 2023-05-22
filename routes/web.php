<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

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

Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::group(['middleware' => ['AuthCheck']], function () {
  Route::get('/', [AppController::class, 'index'])->name('home');
  Route::get('/thoughts/search', [QuotesController::class, 'search'])->name('quotes.search');
  Route::get('/thoughts/{slug}', [QuotesController::class, 'selected'])->name('quotes.selected');
  Route::get('/tags', [TagsController::class, 'index'])->name('tags');
  Route::get('/tags/{slug}', [TagsController::class, 'selected'])->name('tags.selected');
  Route::get('/author', [AuthorController::class, 'index'])->name('author');

  Route::group(['middleware' => ['AdminCheck']], function () {
    Route::view('/admin/{path?}', 'admin')->where('path', '.*');

    Route::get('/quote', [QuotesController::class, 'index']);
    Route::post('/quote', [QuotesController::class, 'store']);
    Route::get('/quote/{id}', [QuotesController::class, 'show']);
    Route::post('/quote/{id}', [QuotesController::class, 'update']);
    Route::delete('/quote/{id}', [QuotesController::class, 'destroy']);
    Route::post('/quotes/delete', [QuotesController::class, 'multidelete']);

    Route::get('/tag', [TagsController::class, 'get']);
    Route::post('/tag', [TagsController::class, 'store']);
    Route::get('/tag/{id}', [TagsController::class, 'show']);
    Route::post('/tag/{id}', [TagsController::class, 'update']);
    Route::delete('/tag/{tag}', [TagsController::class, 'destroy']);
    Route::post('/tag-delete', [TagsController::class, 'multidelete']);

    Route::get('/post', [PostsController::class, 'index']);
    Route::post('/post', [PostsController::class, 'store']);
    Route::get('/post/{id}', [PostsController::class, 'show']);
    Route::post('/post/{id}', [PostsController::class, 'update']);
    Route::delete('/post/{id}', [PostsController::class, 'destroy']);
    Route::post('/posts/delete', [PostsController::class, 'multidelete']);
  });
});
