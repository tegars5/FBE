<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    // Arahkan user ke halaman login setelah registrasi berhasil
    protected $redirectTo = '/login'; // <-- Perubahan di sini!

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:buyer,supplier'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function registered(Request $request, $user)
    {
        // Logika menghubungkan supplier ID
        if (Session::has('pending_supplier_id')) {
            $supplierId = Session::get('pending_supplier_id');
            $supplier = Supplier::find($supplierId);
            if ($supplier) {
                $supplier->user_id = $user->id;
                $supplier->save();
                Session::flash('success', 'Informasi supplier berhasil dihubungkan ke akun Anda!');
            }
            Session::forget('pending_supplier_id');
        }

        // Jangan langsung login user setelah register.
        // Hapus: $this->guard()->login($user); // Jika ada

        // Redirect user ke halaman login
        return redirect()->route('login')->with('status', 'Registration successful! Please log in.');
        // Menambahkan with('status', ...) agar ada pesan sukses di halaman login (opsional)
    }

    /*
     * Hapus atau komen out metode redirectTo() di sini
     * karena kita sudah menggunakan properti $redirectTo di atas.
     *
    protected function redirectTo()
    {
        // Logika pengalihan sebelumnya (ke dashboard) tidak lagi digunakan di sini
        // karena kita ingin redirect ke halaman login.
        // Cukup hapus atau komentari seluruh metode ini jika ada.
        // return route('login');
    }
    */
}
