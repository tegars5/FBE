<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController; // Tambahkan ini
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
// Catatan: Akses ke form ini oleh guest akan meminta login jika ada validasi di JS/Controller
Route::prefix('supplier')->group(function () {
    Route::get('/mill-factory-form', function () {
        return view('supplier.mill-factory-form');
    })->name('supplier.formFactory');

    Route::get('/collector-form', function () {
        return view('supplier.collector-form');
    })->name('supplier.formCollector');
});
Route::middleware(['auth', 'role:buyer'])->prefix('buyer')->group(function () {
    // Corrected route for Purchase Orders
    Route::get('/purchase-orders', [BuyerController::class, 'purchaseOrders'])->name('buyer.purchase-orders');

    Route::get('/request-quote', function () {
        return view('buyer.request-quote');
    })->name('buyer.formRequestQuote'); // Keep this name if 'buyer.formRequestQuote' is used elsewhere
});

// Route untuk mengirim contact form
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Rute untuk melihat artikel individual (jika publik)
Route::resource('articles', ArticleController::class)->except(['create', 'store', 'edit', 'update', 'destroy']); // Hanya untuk publik (read-only)

// --- Rute Autentikasi Laravel (Login, Register, Logout, dll.) ---
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
        // Fallback jika role tidak dikenal atau belum diatur (jarang terjadi jika role selalu ada)
        return view('home');
    })->name('dashboard');

    // Rute umum untuk Profile (Bisa diakses oleh Admin, Supplier, Buyer)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

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
        // Anda mungkin ingin menampilkan data supplier di sini juga,
        // seperti pada halaman 'My Page' yang Anda deskripsikan.
        return view('supplier.dashboard'); // Pastikan view ini ada
    })->name('supplier.dashboard');

    // Contoh rute lain untuk supplier, misalnya melihat data yang mereka submit.
    Route::get('/my-submissions', [SupplierController::class, 'mySubmissions'])->name('supplier.mySubmissions');
});


// --- Rute Khusus Buyer ---
// Hanya bisa diakses oleh user yang login DAN memiliki role 'buyer'.
Route::middleware(['auth', 'role:buyer'])->prefix('buyer')->group(function () { // Menggunakan prefix 'buyer'
    Route::get('/dashboard', function () {
        $buyer = Auth::user()->buyer; // Dapatkan data buyer dari user yang login
        return view('buyer.dashboard', compact('buyer'));
    })->name('buyer.dashboard');

    // Rute buyer yang ada di daftar revisi bos
    Route::get('/purchase-orders', [BuyerController::class, 'purchaseOrders'])->name('buyer.purchase-orders');
    Route::get('/request-quote', [BuyerController::class, 'requestQuote'])->name('buyer.request-quote'); // Jika ini untuk halaman, bukan form publik
    Route::get('/order-history', [BuyerController::class, 'orderHistory'])->name('buyer.order-history');

    // Contoh rute lain untuk buyer.
    Route::get('/products-catalog', function () {
        return view('buyer.products-catalog');
    })->name('buyer.productsCatalog');
});
