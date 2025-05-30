<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserController;
use App\Models\Admin;

Route::get('/', function () {
    return view('home');
});
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::resource('articles', ArticleController::class);
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');






// Route untuk menampilkan dashboard admin
Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


// Route yang hanya bisa diakses admin yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        $articles = \App\Models\Article::all();
        // dd($articles);
        return view('admin.dashboard', [
            'articles' => \App\Models\Article::all(),
        ]);
    })->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('admin/articles', function () {
        $articles = \App\Models\Article::all();
        return view('admin.article', compact('articles'));
    })->name('admin.articles');
});

// Route resource untuk artikel

Route::get('/', [ArticleController::class, 'home']);
