<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SupplierController; // Pastikan ini diimpor
use App\Http\Controllers\ContactController;
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

// Rute Test (opsional, bisa dihapus setelah testing)
Route::get('/test', function () {
    return view('test');
});
Route::get('/revisi', function () {
    return view('revisi');
});

// Rute untuk menampilkan halaman Mill Factory dan Collector (Bisa diakses oleh guest/belum login)
Route::prefix('supplier')->group(function () {
    Route::get('/mill-factory-form', function () {
        return view('supplier.mill-factory-form');
    })->name('supplier.formFactory');

    Route::get('/collector-form', function () {
        return view('supplier.collector-form');
    })->name('supplier.formCollector');
});
// Route untuk mengirim contact form
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Rute untuk melihat artikel individual (jika publik)
Route::resource('articles', ArticleController::class)->except(['create', 'store', 'edit', 'update', 'destroy']); // Hanya untuk publik (read-only)

// --- Rute Autentikasi Laravel (Login, Register, Logout, dll.) ---
// Ini akan membuat rute-rute seperti /login, /register, /logout, /password/reset, dll.
Auth::routes();


// --- Rute yang Membutuhkan Autentikasi (Untuk Semua User yang Login) ---
Route::middleware('auth')->group(function () {
    // Dashboard umum untuk user yang sudah login.
    // Akan diarahkan ke dashboard spesifik role oleh LoginController/RegisterController.
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role === 'supplier') {
            return redirect()->route('supplier.dashboard');
        } elseif (Auth::user()->role === 'buyer') {
            return redirect()->route('buyer.dashboard');
        }
        return view('home'); // Halaman default jika role tidak dikenal
    })->name('dashboard'); // Nama rute umum untuk dashboard

    // Rute untuk SUBMIT formulir supplier (HARUS LOGIN DULU)
    // Ini adalah rute POST yang akan menerima data dari form Mill Factory dan Collector.
    Route::post('/supplier-initial-registration', [SupplierController::class, 'store'])
        ->name('supplier.register.initial');

    Route::post('/supplier-collector-registration', [SupplierController::class, 'collectorRegistration'])
        ->name('supplier.register.collector');
});


// --- Rute Khusus Admin ---
// Hanya bisa diakses oleh user yang login DAN memiliki role 'admin'.
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $articles = \App\Models\Article::all(); // Contoh: mengambil data untuk dashboard admin
        return view('admin.dashboard', compact('articles'));
    })->name('admin.dashboard');

    Route::get('/articles', function () {
        $articles = \App\Models\Article::all();
        return view('admin.article', compact('articles'));
    })->name('admin.articles');

    // Rute resource untuk artikel yang hanya bisa diakses dan dikelola admin (CRUD).
    Route::resource('articles', ArticleController::class)->except(['index', 'show']);
});


// --- Rute Khusus Supplier ---
// Hanya bisa diakses oleh user yang login DAN memiliki role 'supplier'.
Route::middleware(['auth', 'role:supplier'])->prefix('supplier-dashboard')->group(function () {
    Route::get('/dashboard', function () {
        // Logika untuk dashboard supplier
        return view('supplier.dashboard'); // Kamu perlu membuat view ini
    })->name('supplier.dashboard');

    // Contoh rute lain untuk supplier, misalnya melihat data yang mereka submit.
    Route::get('/my-submissions', [SupplierController::class, 'mySubmissions'])->name('supplier.mySubmissions');
});


// --- Rute Khusus Buyer ---
// Hanya bisa diakses oleh user yang login DAN memiliki role 'buyer'.
Route::middleware(['auth', 'role:buyer'])->prefix('buyer-dashboard')->group(function () {
    Route::get('/dashboard', function () {
        // Logika untuk dashboard buyer
        return view('buyer.dashboard'); // Kamu perlu membuat view ini
    })->name('buyer.dashboard');

    // Contoh rute lain untuk buyer.
    Route::get('/products-catalog', function () {
        return view('buyer.products-catalog');
    })->name('buyer.productsCatalog');
});
