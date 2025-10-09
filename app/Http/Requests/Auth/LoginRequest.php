<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Sesuaikan dengan nama input di view Anda
        return [
            'userid' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Ini adalah fungsi yang paling penting.
     * Fungsinya mencoba otentikasi dan akan melempar error jika gagal.
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // KODE KUNCI ADA DI SINI:
        // Auth::attempt() akan men-hash password dari form dan membandingkannya
        // dengan hash password di database. Ini akan mengembalikan 'false' jika tidak cocok.
        // Tanda seru (!) di depan berarti "JIKA TIDAK BERHASIL".
        if (! Auth::attempt($this->only('userid', 'password'), $this->boolean('remember'))) {
            
            // Jika tidak berhasil, catat percobaan gagal (untuk rate limiting)
            RateLimiter::hit($this->throttleKey());

            // LEMPAR ERROR VALIDASI. Ini akan menghentikan eksekusi dan mengembalikan
            // pengguna ke halaman login dengan pesan error.
            throw ValidationException::withMessages([
                'userid' => trans('auth.failed'),
            ]);
        }

        // Baris ini HANYA akan berjalan jika Auth::attempt() berhasil.
        RateLimiter::clear($this->throttleKey());
    }
    
    // ... (method lain seperti ensureIsNotRateLimited dan throttleKey)

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }
        event(new Lockout($this));
        $seconds = RateLimiter::availableIn($this->throttleKey());
        throw ValidationException::withMessages([
            'userid' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('userid')).'|'.$this->ip());
    }
}