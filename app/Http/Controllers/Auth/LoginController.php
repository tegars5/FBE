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

    /**
     * Where to redirect users after login.
     * Dihapus dari sini karena akan ditangani oleh method redirectTo() di bawah.
     *
     * @var string
     */
    // protected $redirectTo = '/'; // <-- Dihapus

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Mendefinisikan ke mana pengguna akan diarahkan setelah login berdasarkan peran mereka.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin':
                return route('admin.dashboard'); // Arahkan ke dasbor admin
            case 'supplier':
                return route('supplier.dashboard'); // Arahkan ke dasbor supplier
            case 'buyer':
                return route('buyer.dashboard'); // Arahkan ke dasbor buyer
            default:
                return '/'; // Halaman default jika peran tidak dikenali
        }
    }

    /**
     * Send the response after the user was authenticated.
     * (Tidak ada perubahan di sini, logika ini tetap penting)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        // Logika menghubungkan supplier (ini tetap penting)
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
