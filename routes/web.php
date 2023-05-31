<?php

use App\Http\Controllers\Front\CategoryFrontController;
use App\Http\Controllers\Front\LeagueFrontController;
use App\Http\Controllers\Front\ArticleFrontController;
use App\Http\Controllers\Front\HomeFrontController;
use App\Http\Controllers\Front\VideoFrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeFrontController::class, 'index'])->name('front.home');

// Search
Route::get('/results', [HomeFrontController::class, 'search'])->name('front.search');

// Matches
Route::get('/matches', [LeagueFrontController::class, 'matches'])->name('front.matches');

// Articles
Route::get('/articles', [ArticleFrontController::class, 'index'])->name('front.articles');
Route::get('/articles/hotnews', [ArticleFrontController::class, 'hotnews'])->name('front.articles.hotnews');
Route::get('/articles/{id}/{slug?}', [ArticleFrontController::class, 'single'])->name('front.articles.single');

// Videos
Route::get('/videos', [VideoFrontController::class, 'index'])->name('front.videos');

// Categories
// Route::get('/categories', [CategoryFrontController::class, 'index'])->name('front.home');
Route::get('/categories/{id}/{slug?}', [CategoryFrontController::class, 'single'])->name('front.categories.single');

// League
Route::get('/categories', function(){
    return redirect()->route('front.home');
});
Route::get('/leagues', function(){
    return redirect()->route('front.home');
});
Route::get('/leagues/{id}/{slug?}', [LeagueFrontController::class, 'single'])->name('front.leagues.single');

