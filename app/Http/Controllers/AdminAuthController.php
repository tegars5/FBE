<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial admin
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Login berhasil
            Auth::guard('web')->login($admin);  // Pastikan menggunakan guard yang tepat
            return redirect()->route('admin.dashboard');  // Redirect ke dashboard admin
        } else {
            // Jika gagal login
            return back()->withErrors(['email' => 'Email atau password salah']);
        }
    }

    // Logout
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');  // Redirect ke halaman login
    }
}
