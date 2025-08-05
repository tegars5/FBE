<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;

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

// --- Rute Publik (Bisa Diakses Siapa Saja, Termasuk Guest) ---

// Halaman Utama
Route::get('/', [ArticleController::class, 'home'])->name('home');

// Rute untuk menampilkan halaman Mill Factory dan Collector (Bisa diakses oleh guest/belum login)
Route::prefix('supplier')->group(function () {
    Route::get('/mill-factory-form', function () {
        return view('supplier.mill-factory-form');
    })->name('supplier.formFactory');

    Route::get('/collector-form', function () {
        return view('supplier.collector-form');
    })->name('supplier.formCollector');
});

// Rute untuk melihat artikel individual (jika publik)
Route::resource('articles', ArticleController::class)->only(['index', 'show']); // Lebih aman menggunakan only() untuk rute publik

// --- Rute Autentikasi Laravel (Login, Register, Logout, dll.) ---
Auth::routes();


// --- Rute yang Membutuhkan Autentikasi (Untuk Semua User yang Login) ---
Route::middleware('auth')->group(function () {

    // Dashboard umum yang akan mengarahkan berdasarkan peran
    Route::get('/dashboard', function () {
        $role = Auth::user()->role;
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'supplier') {
            return redirect()->route('supplier.dashboard');
        } elseif ($role === 'buyer') {
            return redirect()->route('buyer.dashboard');
        }
        return redirect()->route('home'); // Fallback ke home jika role tidak ada
    })->name('dashboard');

    // --- Rute Profil Pengguna ---
    // Semua rute profil dikelompokkan di sini agar rapi
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // INI RUTE YANG HILANG: Rute untuk menyimpan data dari form edit
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


    // Rute untuk SUBMIT formulir supplier (HARUS LOGIN DULU)
    Route::post('/supplier-initial-registration', [SupplierController::class, 'initialRegistration'])
        ->name('supplier.register.initial');

    Route::post('/supplier-collector-registration', [SupplierController::class, 'collectorRegistration'])
        ->name('supplier.register.collector');
});


// --- Rute Khusus Admin ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $articles = \App\Models\Article::all();
        return view('admin.dashboard', compact('articles'));
    })->name('dashboard');

    Route::get('/articles', function () {
        $articles = \App\Models\Article::all();
        return view('admin.article', compact('articles'));
    })->name('articles.index'); // Menggunakan konvensi nama resource

    // Rute resource untuk artikel yang hanya bisa diakses dan dikelola admin (CRUD).
    Route::resource('articles', ArticleController::class)->except(['index', 'show']);
});


// --- Rute Khusus Supplier ---
Route::middleware(['auth', 'role:supplier'])->prefix('supplier-dashboard')->name('supplier.')->group(function () {
    Route::get('/dashboard', function () {
        return view('supplier.dashboard');
    })->name('dashboard');

    Route::get('/my-submissions', [SupplierController::class, 'mySubmissions'])->name('mySubmissions');
});


// --- Rute Khusus Buyer ---
Route::middleware(['auth', 'role:buyer'])->prefix('buyer-dashboard')->name('buyer.')->group(function () {
    Route::get('/dashboard', function () {
        return view('buyer.dashboard');
    })->name('dashboard');

    Route::get('/products-catalog', function () {
        return view('buyer.products-catalog');
    })->name('productsCatalog');
    Route::get('/purchase-request', function () {
        return view('buyer.purchase-request');
    })->name('purchaserequest');
});
