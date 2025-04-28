<?php

use Firefly\FilamentBlog\Http\Controllers\CategoryController;
use Firefly\FilamentBlog\Http\Controllers\CommentController;
use Firefly\FilamentBlog\Http\Controllers\PostController;
use Firefly\FilamentBlog\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web']) // <- HARD CODE 'web', not config anymore
    ->prefix('lessons')     // <- URL prefix will be /lessons/...
    ->name('filamentlessons.') // <- Route name prefix filamentlessons.
    ->group(function () {

        // Lessons Posts
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/all', [PostController::class, 'allPosts'])->name('post.all');
        Route::get('/search', [PostController::class, 'search'])->name('post.search');
        Route::get('/{post:slug}', [PostController::class, 'show'])->name('post.show');
        Route::post('/subscribe', [PostController::class, 'subscribe'])
            ->middleware('throttle:5,1')
            ->name('post.subscribe');

        // Lessons Categories
        Route::get('/categories/{category:slug}', [CategoryController::class, 'posts'])->name('category.post');

        // Lessons Tags
        Route::get('/tags/{tag:slug}', [TagController::class, 'posts'])->name('tag.post');

        // Lessons Comments
        Route::post('/posts/{post:slug}/comment', [CommentController::class, 'store'])
            ->middleware('auth')
            ->name('comment.store');

        // Lessons Login
        Route::get('/login', function () {
            return redirect()->route('filamentlessons.post.index');
        })->name('post.login');
    });
