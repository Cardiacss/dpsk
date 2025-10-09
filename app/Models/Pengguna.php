<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pengguna';
    protected $primaryKey = 'idpengguna';
    public $timestamps = false; // tambahkan jika tabel tidak punya created_at / updated_at

    protected $fillable = [
        'namalengkap',
        'userid',
        'pass',
        'jabatan',
        'level',
        'is_activated'
    ];

    protected $hidden = [
        'pass',
    ];

    // Gunakan kolom 'pass' untuk password
    public function getAuthPassword()
    {
        return $this->pass;
    }

    // Gunakan 'userid' untuk login (bukan email)
    public function getAuthIdentifierName()
    {
        return 'userid';
    }

    // Tambahan optional: method untuk peran (role)
    public function isAdmin()
    {
        return $this->level === 'admin';
    }

    public function isUser()
    {
        return $this->level === 'user';
    }
}
