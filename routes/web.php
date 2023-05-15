<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthorController;
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

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/thoughts/search', [QuotesController::class, 'search'])->name('quotes.search');
Route::get('/thoughts/{slug}', [QuotesController::class, 'selected'])->name('quotes.selected');
Route::get('/tags', [TagsController::class, 'index'])->name('tags');
Route::get('/tags/{slug}', [TagsController::class, 'selected'])->name('tags.selected');
Route::get('/author', [AuthorController::class, 'index'])->name('author');
