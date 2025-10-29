<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TIuranPeserta extends Model
{
    use HasFactory;

    protected $table = 't_iuranpeserta';
    protected $primaryKey = 'id_iuran';

    public $incrementing = true; 
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'idanggota',
        'gajipokok',
        'phdp',
        'ip_num',
        'ip_pct',
        'ipk_pct',
        'ipk_num',
        'tglcatat',
        'tglsetor',
        'thn_iuran',
        'bln_iuran',
        'flag_iuran',
        'ip_num0',
        'ipk_num0',
    ];

    protected $casts = [
        'gajipokok' => 'decimal:2',
        'phdp' => 'decimal:2',
        'ip_num' => 'decimal:2',
        'ip_pct' => 'float',
        'ipk_pct' => 'float',
        'ipk_num' => 'decimal:2',
        'ip_num0' => 'decimal:2',
        'ipk_num0' => 'decimal:2',
        'tglcatat' => 'date',
        'tglsetor' => 'date',
        'thn_iuran' => 'integer',
        'bln_iuran' => 'integer',
    ];

    public function peserta()
    {
        return $this->belongsTo(TPeserta::class, 'idanggota', 'idanggota');
    }
}
