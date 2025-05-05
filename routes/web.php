<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return view('home');
});
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');


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

// Route resource untuk artikel
Route::resource('articles', ArticleController::class);
Route::get('/', [ArticleController::class, 'home']);
