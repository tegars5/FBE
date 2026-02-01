<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BuyerDashboardController;
use App\Http\Controllers\SupplierDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminSupplierController;
use App\Http\Controllers\Admin\AdminBuyerController;

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
Auth::routes();

// --- Rute yang Membutuhkan Autentikasi ---
Route::middleware('auth')->group(function () {
    // Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Dashboard berdasarkan peran (Supplier / Buyer / Admin)
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role === 'supplier') {
            return redirect()->route('supplier.dashboard');
        } elseif (Auth::user()->role === 'buyer') {
            return redirect()->route('buyer.dashboard');
        }
        return view('home');
    })->name('dashboard');
});


// --- Rute Khusus Admin ---
// Hanya bisa diakses oleh user yang login DAN memiliki role 'admin'.
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminUserController::class, 'dashboard'])->name('admin.dashboard');

    // Route untuk pending users
    Route::get('/users/pending', [AdminUserController::class, 'pending'])->name('admin.users.pending');
    Route::post('/users/{user}/approve', [AdminUserController::class, 'approve'])->name('admin.users.approve');
    Route::post('/users/{user}/reject', [AdminUserController::class, 'reject'])->name('admin.users.reject');

    // Routes untuk Suppliers Management
    Route::get('/suppliers', [AdminSupplierController::class, 'index'])->name('admin.suppliers.index');
    Route::get('/suppliers/{supplier}', [AdminSupplierController::class, 'show'])->name('admin.suppliers.show');
    Route::get('/suppliers/{supplier}/edit', [AdminSupplierController::class, 'edit'])->name('admin.suppliers.edit');
    Route::put('/suppliers/{supplier}', [AdminSupplierController::class, 'update'])->name('admin.suppliers.update');
    Route::delete('/suppliers/{supplier}', [AdminSupplierController::class, 'destroy'])->name('admin.suppliers.destroy');

    // Routes untuk Buyers Management
    Route::get('/buyers', [AdminBuyerController::class, 'index'])->name('admin.buyers.index');
    Route::get('/buyers/{buyer}', [AdminBuyerController::class, 'show'])->name('admin.buyers.show');
    Route::get('/buyers/{buyer}/edit', [AdminBuyerController::class, 'edit'])->name('admin.buyers.edit');
    Route::put('/buyers/{buyer}', [AdminBuyerController::class, 'update'])->name('admin.buyers.update');
    Route::delete('/buyers/{buyer}', [AdminBuyerController::class, 'destroy'])->name('admin.buyers.destroy');

    // Routes untuk Article Management
    Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');

    Route::post('/submissions/{supplier}/accept', [AdminUserController::class, 'acceptSubmission'])->name('submissions.accept');
    Route::post('/submissions/{supplier}/reject', [AdminUserController::class, 'rejectSubmission'])->name('submissions.reject');
});

// --- Rute Khusus Supplier ---
// Hanya bisa diakses oleh user yang login DAN memiliki role 'supplier'.
Route::middleware(['auth', 'role:supplier'])->prefix('supplier')->group(function () {
    Route::get('/dashboard', [SupplierDashboardController::class, 'index'])->name('supplier.dashboard');
    Route::get('/my-submissions', [SupplierController::class, 'mySubmissions'])->name('supplier.mySubmissions');
    Route::get('/orders', [SupplierController::class, 'orders'])->name('supplier.orders.index');
    Route::get('/orders/{order}', [SupplierController::class, 'showOrder'])->name('supplier.orders.show');
    Route::post('/mill-factory-form', [SupplierController::class, 'storeFactory'])->name('supplier.factory.store');
    Route::post('/collector-form', [SupplierController::class, 'storeCollector'])->name('supplier.collector.store');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('supplier.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('supplier.profile.update');
});


// --- Rute Khusus Buyer ---
// Hanya bisa diakses oleh user yang login DAN memiliki role 'buyer'.
Route::middleware(['auth', 'role:buyer'])->prefix('buyer')->group(function () {
    Route::get('/dashboard', [BuyerDashboardController::class, 'index'])->name('buyer.dashboard');
    Route::get('/purchase-request', [BuyerDashboardController::class, 'purchaseRequest'])->name('buyer.purchaserequest');
    Route::post('/purchase-request', [BuyerDashboardController::class, 'storePurchaseRequest'])->name('buyer.purchaserequest.store');
    Route::get('/purchase-orders', [BuyerDashboardController::class, 'purchaseOrders'])->name('buyer.purchase-orders');
    Route::get('/request-quote', [BuyerDashboardController::class, 'requestQuote'])->name('buyer.request-quote');
    Route::post('/request-quote', [BuyerDashboardController::class, 'storeQuote'])->name('buyer.request-quote.store');
    Route::get('/products-catalog', [BuyerDashboardController::class, 'productsCatalog'])->name('buyer.productsCatalog');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('buyer.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('buyer.profile.update');
});
