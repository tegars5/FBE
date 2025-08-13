<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function redirectTo()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin':
                return route('admin.dashboard');
            case 'supplier':
                return route('supplier.dashboard');
            case 'buyer':
                return route('buyer.dashboard');
            default:
                return '/';
        }
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        // =================================================================
        // PERBAIKAN DI SINI: Tambahkan Pengecekan Status Pengguna
        // =================================================================
        $user = Auth::user();

        // Cek jika status user BUKAN 'active'
        if ($user->status !== 'active') {
            Auth::logout(); // Wajib logout lagi agar session tidak tersimpan

            // Siapkan pesan error sesuai statusnya
            $message = $user->status === 'pending'
                ? 'Akun Anda sedang menunggu verifikasi dari admin.'
                : 'Akun Anda tidak aktif. Silakan hubungi administrator.';

            return redirect('/login')->with('error', $message);
        }
        // =================================================================


        // Logika menghubungkan supplier (ini tetap penting dan berjalan HANYA JIKA user sudah aktif)
        if (Session::has('pending_supplier_id')) {
            $supplierId = Session::get('pending_supplier_id');
            $supplier = Supplier::find($supplierId);

            if ($supplier && is_null($supplier->user_id)) {
                $supplier->user_id = Auth::id();
                $supplier->save();
                Session::forget('pending_supplier_id');
                Session::flash('success', 'Informasi supplier berhasil dihubungkan ke akun Anda!');
            } else if ($supplier && !is_null($supplier->user_id) && $supplier->user_id != Auth::id()) {
                Session::forget('pending_supplier_id');
                Session::flash('warning', 'Informasi supplier sudah terhubung atau tidak dapat dihubungkan ke akun ini.');
            } else {
                Session::forget('pending_supplier_id');
            }
        }

        // Pengalihan sekarang akan menggunakan path dari method redirectTo()
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }
}
