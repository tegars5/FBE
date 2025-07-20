<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Import Session Facade
use App\Models\Supplier; // Import Model Supplier Anda
use Illuminate\Http\JsonResponse; // Import JsonResponse jika belum ada

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home'; // Atau '/home'

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validasi input form login (dari trait AuthenticatesUsers)
        $this->validateLogin($request);

        // Jika ada terlalu banyak percobaan login, kunci akun sementara (dari trait AuthenticatesUsers)
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // Coba untuk melakukan login (dari trait AuthenticatesUsers)
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request); // Redirect jika berhasil
        }

        // Tambah jumlah percobaan login yang gagal (dari trait AuthenticatesUsers)
        $this->incrementLoginAttempts($request);

        // Kirim respons jika login gagal (dari trait AuthenticatesUsers)
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Send the response after the user was authenticated.
     * Overrides the method from AuthenticatesUsers trait.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate(); // Regenerate session ID for security

        $this->clearLoginAttempts($request);

        // --- LOGIKA BARU UNTUK MENGHUBUNGKAN SUPPLIER ---
        if (Session::has('pending_supplier_id')) {
            $supplierId = Session::get('pending_supplier_id');
            $supplier = Supplier::find($supplierId);

            if ($supplier && is_null($supplier->user_id)) { // Pastikan supplier ditemukan dan user_id masih null
                $supplier->user_id = Auth::id(); // Hubungkan dengan user yang baru login
                $supplier->save();
                Session::forget('pending_supplier_id'); // Hapus dari sesi setelah berhasil
                Session::flash('success', 'Supplier information linked to your account successfully!');
            } else if ($supplier && !is_null($supplier->user_id) && $supplier->user_id != Auth::id()) {
                // Kasus langka: supplier sudah terhubung ke user lain, atau user_id tidak null
                // Anda bisa tambahkan logika penanganan error/warning di sini
                Session::forget('pending_supplier_id'); // Hapus dari sesi untuk menghindari masalah
                Session::flash('warning', 'Supplier information was already linked or could not be linked to this account.');
            } else {
                Session::forget('pending_supplier_id'); // Hapus dari sesi jika supplier tidak ditemukan
            }
        }
        // --- AKHIR LOGIKA BARU ---

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }
}
