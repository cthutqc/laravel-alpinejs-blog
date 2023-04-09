<?php

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

Route::get('/', \App\Http\Controllers\HomeController::class)
    ->name('home');

Route::get('articles', [\App\Http\Controllers\ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('articles/{article:slug}', [\App\Http\Controllers\ArticleController::class, 'show'])
    ->name('articles.show');

Route::post('articles/like', [\App\Http\Controllers\ArticleController::class, 'like'])
    ->name('articles.like');

Route::get('tags/{article_tag:slug}', \App\Http\Controllers\ArticleTagController::class)
    ->name('article_tags.show');

Route::post('comment/store', [\App\Http\Controllers\CommentController::class, 'store'])
    ->name('comment.store');
