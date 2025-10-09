<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TUnitMitra extends Model
{
    use HasFactory;

    protected $table = 't_unitmitra';
    protected $primaryKey = 'idunit';
    public $timestamps = false;

    protected $fillable = [
        'idunit',
        'nama_um',
        'alamat_um',
        'kelurahan',
        'kecamatan',
        'kotakab',
        'provinsi',
        'idmitraup',
        'stat_um',
        'ip_pct',
        'ipk_pct',
        'urut',
        'nilaitambahan',
        'tahunakatuaria',
    ];

    protected $casts = [
        'ip_pct' => 'float',
        'ipk_pct' => 'float',
        'nilaitambahan' => 'float',
        'tahunakatuaria' => 'integer',
    ];

    // Jika unit mitra memiliki banyak peserta
    public function peserta()
    {
        return $this->hasMany(TPeserta::class, 'idunit', 'idunit');
    }
}
