<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TMitra extends Model
{
    use HasFactory;

    protected $table = 't_mitra';
    protected $primaryKey = 'idmitra';
    public $timestamps = false;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idmitra',
        'nama_um',
        'alamat_um',
        'kelurahan',
        'kecamatan',
        'kotakab',
        'provinsi',
        'idunit',
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

    public function unitMitra()
    {
        return $this->belongsTo(TUnitMitra::class, 'idunit', 'idunit');
    }
    
}
