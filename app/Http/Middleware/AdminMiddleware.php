<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Jangan lupa impor Auth

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // LOGIKA UTAMA ADA DI SINI
        if (Auth::check() && Auth::user()->role === 'admin') {
            // User sudah login dan memiliki role 'admin', lanjutkan request
            return $next($request);
        }

        // Jika tidak, arahkan kembali ke halaman utama dengan pesan error
        return redirect('/')->with('error', 'Akses ditolak. Anda bukan Admin.');
    }
}