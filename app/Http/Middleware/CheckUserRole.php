<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke login jika belum login
        }

        $user = Auth::user();

        if (!in_array($user->role, $roles)) {
            // Redirect atau tampilkan pesan error jika tidak memiliki role yang sesuai
            abort(403, 'Unauthorized access.'); // Atau redirect ke halaman error/dashboard
        }

        return $next($request);
    }
}
