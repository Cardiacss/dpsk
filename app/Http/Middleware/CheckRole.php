<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles  // Ini akan menampung peran yang diizinkan (misal: 'Administrator')
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        // Periksa jika jabatan pengguna ada di dalam daftar peran yang diizinkan
        if ($user && in_array($user->jabatan, $roles)) {
            // Jika cocok, izinkan pengguna melanjutkan
            return $next($request);
        }

        // Jika tidak cocok, tolak akses dan tampilkan halaman error 403
        abort(403, 'AKSES DITOLAK. ANDA TIDAK MEMILIKI HAK UNTUK MENGAKSES HALAMAN INI.');
    }
}