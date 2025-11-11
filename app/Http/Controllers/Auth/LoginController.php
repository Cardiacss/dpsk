<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'userid' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Pengguna::where('userid', $credentials['userid'])->first();

        if (!$user) {
            return back()->withErrors(['userid' => 'User ID tidak ditemukan.']);
        }

        // --- Periksa password ---
        $valid = false;
        if (Hash::check($credentials['password'], $user->pass)) {
            $valid = true; // password hashed
        } elseif ($credentials['password'] === $user->pass) {
            $valid = true; // password plain text
        }

        if (!$valid) {
            return back()->withErrors(['userid' => 'Password salah.']);
        }

        // --- Login user ---
        Auth::login($user);

        // --- Redirect sesuai role ---
        if ($user->jabatan === 'Administrator' || $user->level == -1) {
            return redirect()->route('admin.menu');
        } elseif ($user->userid === 'operator1') {
            return redirect()->route('operator1.menu');
        } elseif ($user->userid === 'operator2') {
            return redirect()->route('operator2.menu');
        } elseif ($user->userid === 'kepala') {
            return redirect()->route('kepala.menu');
        }
        return redirect()->route('login')->withErrors(['userid' => 'Role pengguna tidak dikenal.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
