<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest; // Pastikan ini di-import
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Menangani request otentikasi yang masuk.
     * Ini adalah versi FINAL yang memperbaiki SEMUA masalah.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        
        $request->session()->regenerate();

        $user = Auth::user(); 
        switch ($user->jabatan) {
            case 'Administrator':
                return redirect()->route('admin.menu');
            
            case 'Operator1':
                return redirect()->route('operator1.menu');

            case 'Operator2':
                return redirect()->route('operator2.menu');

            case 'Kepala':
                return redirect()->route('kepala.menu');

            default:
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/')->withErrors(['userid' => 'Peran tidak terdefinisi.']);
        }
    }

    /**
     * Menghancurkan sesi (logout).
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}