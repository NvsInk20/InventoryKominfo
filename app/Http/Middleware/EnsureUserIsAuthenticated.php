<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            // Arahkan ke halaman login jika belum login
            return redirect()->route('login')->withErrors(['login' => 'Silakan login untuk mengakses halaman ini.']);
        }

        // Lanjutkan ke request berikutnya jika sudah login
        return $next($request);
    }
}
