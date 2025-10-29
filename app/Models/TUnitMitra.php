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

    // Tambahkan dua baris ini
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idunit',
        'nama_um',
        'alamat_um',
        'kelurahan',
        'kecamatan',
        'kotakab',
        'provinsi',
        'stat_um',
        'ip_pct',
        'ipk_pct',
        'urut',
        'nilaitambahan',
        'idaktuaria',
    ];

    protected $casts = [
        'ip_pct' => 'float',
        'ipk_pct' => 'float',
        'nilaitambahan' => 'float',
        'idaktuaria' => 'integer',
    ];

    public function peserta()
    {
        return $this->hasMany(TPeserta::class, 'idunit', 'idunit');
    }
}
