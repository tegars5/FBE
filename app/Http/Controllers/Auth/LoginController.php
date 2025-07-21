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

    // Arahkan user ke halaman home (/) setelah login berhasil
    protected $redirectTo = '/'; // <-- Perubahan di sini!

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // ... metode login lainnya (tidak ada perubahan di metode login itu sendiri)

    /**
     * Send the response after the user was authenticated.
     * Overrides the method from AuthenticatesUsers trait.
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

        // Pengalihan ke halaman yang dituju oleh $redirectTo = '/';
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath()); // redirectPath() akan menggunakan $redirectTo
    }

    /*
     * Hapus atau komen out metode redirectTo() di sini jika ada.
     * Cukup gunakan properti $redirectTo = '/'; di atas.
     *
    protected function redirectTo()
    {
        // Logika pengalihan sebelumnya (ke dashboard) tidak lagi digunakan di sini.
        // Cukup hapus atau komentari seluruh metode ini jika ada.
        // return '/';
    }
    */
}
