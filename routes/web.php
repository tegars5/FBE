<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SupplierController; // Pastikan ini diimpor
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

// Rute untuk melihat artikel individual (jika publik)
Route::resource('articles', ArticleController::class)->except(['create', 'store', 'edit', 'update', 'destroy']); // Hanya untuk publik (read-only)

// --- Rute Autentikasi Laravel (Login, Register, Logout, dll.) ---
// Ini akan membuat rute-rute seperti /login, /register, /logout, /password/reset, dll.
Auth::routes();
// Di dalam web.php, pastikan ada rute untuk supplier.formFactory
// Supplier Routes
Route::prefix('supplier')->middleware('auth')->group(function () {
    Route::get('/mill-factory-form', [SupplierController::class, 'showForm'])->name('supplier.formFactory');
    Route::get('/collector-form', [SupplierController::class, 'showCollectorForm'])->name('supplier.formCollector');
});



// --- Rute yang Membutuhkan Autentikasi ---
Route::middleware('auth')->group(function () {
    // Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');  // Menampilkan Profil Pengguna
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');  // Edit Profil
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');  // Update Profil

    // Dashboard berdasarkan peran (Supplier / Buyer / Admin)
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
    Route::post('/supplier-initial-registration', [SupplierController::class, 'initialRegistration'])
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

    Route::post('/submissions/{supplier}/accept', [AdminUserController::class, 'acceptSubmission'])->name('submissions.accept');
    Route::post('/submissions/{supplier}/reject', [AdminUserController::class, 'rejectSubmission'])->name('submissions.reject');
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
