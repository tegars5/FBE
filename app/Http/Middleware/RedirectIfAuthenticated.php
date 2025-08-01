<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
// TIDAK ADA 'use App\Providers\RouteServiceProvider;' lagi di Laravel 11/12

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // === LOGIC VERIFIKASI SEBELUM LOGIN ===
                if (!$user->is_verified) {
                    Auth::guard($guard)->logout(); // Logout user yang belum diverifikasi
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect()->route('login')->with('status', 'Akun Anda belum diverifikasi oleh admin. Silakan cek email Anda untuk update.');
                }
                // =======================================

                // Redirect berdasarkan role setelah diverifikasi
                if ($user->role === 'buyer') {
                    return redirect('/buyer/dashboard'); // Langsung ke string path
                } elseif ($user->role === 'supplier') {
                    return redirect('/supplier/dashboard'); // Langsung ke string path
                }
                return redirect('/dashboard'); // Default
            }
        }

        return $next($request);
    }
}
