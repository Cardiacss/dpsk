<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TAPensiun extends Model
{
    use HasFactory;

    protected $table = 't_apensiun';       // Nama tabel di database
    protected $primaryKey = 'idpensiun';   // Primary key tabel
    public $timestamps = false;            // Tidak ada created_at & updated_at

    protected $fillable = [
        'nopensiun',
        'idanggota',
        'tglmohon',
        'tmtpensiun',
        'nosuratberhenti',
        'statuspensiun',
        'suratdari',
        'tglsuratdari',
        'nosuratdari',
        'tgldari',
        'statusmanfaat',
        'flag_pensiun',
        'first_bulan',
        'first_tahun',
        'last_bulan',
        'last_tahun',
        'mpakhir',
        'rekening',
        'keterangan',
        'statushidup',
        'mpawal',
        'idxPCT',
        'noagendadpsk',
        'rmspensiun',
        'nosuratterminasi',
        'tglterminasi',
    ];

    protected $casts = [
        'tglmohon' => 'date',
        'tmtpensiun' => 'date',
        'tglsuratdari' => 'date',
        'tgldari' => 'date',
        'tglterminasi' => 'date',
        'mpakhir' => 'decimal:2',
        'mpawal' => 'float',
        'idxPCT' => 'float',
        'statushidup' => 'boolean',
    ];

    // Relasi ke tabel peserta (Many-to-One)
    public function peserta()
    {
        return $this->belongsTo(TPeserta::class, 'idanggota', 'idanggota');
    }
    public function manfaat()
{
    // relasi ke t_manfaatpensiun berdasarkan idanggota
    return $this->hasOne(\App\Models\TManfaatPensiun::class, 'idanggota', 'idanggota');
}
}
