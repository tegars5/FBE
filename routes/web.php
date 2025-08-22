<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminBuyerController;
use App\Http\Controllers\Admin\AdminSupplierController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\SupplierDashboardController;
use App\Http\Controllers\BuyerDashboardController;
use App\Http\Controllers\SupplierController;

// --- Rute Publik ---
Route::get('/', [ArticleController::class, 'home'])->name('home');
Route::resource('articles', ArticleController::class)->only(['index', 'show']);

// --- Auth ---
Auth::routes();
// Di dalam web.php, pastikan ada rute untuk supplier.formFactory
// Supplier Routes
Route::prefix('supplier')->middleware('auth')->group(function () {
    Route::get('/mill-factory-form', [SupplierController::class, 'showForm'])->name('supplier.formFactory');
    Route::get('/collector-form', [SupplierController::class, 'showCollectorForm'])->name('supplier.formCollector');
});

// Route untuk mengirim contact form
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');



// --- Rute yang Membutuhkan Autentikasi ---
Route::middleware('auth')->group(function () {
    // Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');  // Menampilkan Profil Pengguna
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');  // Edit Profil
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');  // Update Profil
    // Dashboard berdasarkan peran (Supplier / Buyer / Admin)
    Route::get('/dashboard', function () {
        $role = Auth::user()->role;
        if ($role === 'admin') return redirect()->route('admin.dashboard');
        if ($role === 'supplier') return redirect()->route('supplier.dashboard');
        if ($role === 'buyer') return redirect()->route('buyer.dashboard');
        return redirect()->route('home');
    })->name('dashboard');
});

// --- Admin ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminUserController::class, 'dashboard'])->name('dashboard');
    Route::resource('suppliers', AdminSupplierController::class);
    Route::resource('buyers', AdminBuyerController::class);
    Route::resource('articles', ArticleController::class);

    Route::get('/users/pending', [AdminUserController::class, 'pending'])->name('users.pending');
    Route::post('/users/{user}/approve', [AdminUserController::class, 'approve'])->name('users.approve');
    Route::post('/users/{user}/reject', [AdminUserController::class, 'reject'])->name('users.reject');

    Route::post('/submissions/{supplier}/accept', [AdminUserController::class, 'acceptSubmission'])->name('submissions.accept');
    Route::post('/submissions/{supplier}/reject', [AdminUserController::class, 'rejectSubmission'])->name('submissions.reject');
});

Route::middleware(['auth', 'role:supplier'])
    ->prefix('supplier-dashboard')
    ->name('supplier.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [SupplierDashboardController::class, 'index'])->name('dashboard');

        // Profile & Product
        Route::get('/profile/edit', [SupplierDashboardController::class, 'editProfile'])->name('profile.edit');
        Route::post('/profile/update', [SupplierDashboardController::class, 'updateProfile'])->name('profile.update');
        Route::post('/product/save', [SupplierDashboardController::class, 'saveProductManagement'])->name('product.save');

        // Orders
        Route::get('/orders', [SupplierDashboardController::class, 'ordersIndex'])->name('orders.index');

        // Mill Factory Form
        Route::get('/mill-factory-form', [SupplierController::class, 'showForm'])->name('formFactory');
    });

// --- Buyer ---
Route::middleware(['auth', 'role:buyer'])
    ->prefix('buyer')
    ->name('buyer.')
    ->group(function () {
        Route::get('/dashboard', [BuyerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/purchase-request', [BuyerDashboardController::class, 'purchaseRequest'])
            ->name('purchaserequest');
    });
