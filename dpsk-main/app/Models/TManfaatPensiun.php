<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TManfaatPensiun extends Model
{
    use HasFactory;

    protected $table = 't_manfaatpensiun';
    protected $primaryKey = 'idmanfaatpensiun';
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'idanggota',
        'tglberimanfaat', // diperbaiki dari tglbermanfaat
        'thn_setor',
        'bln_setor',
        'nilai_mp',
        'keterangan',
    ];

    protected $casts = [
        'tglberimanfaat' => 'date',
        'nilai_mp' => 'decimal:3', // disesuaikan dengan DECIMAL(18,3)
    ];

    // Relasi ke peserta
    public function peserta()
    {
        return $this->belongsTo(TPeserta::class, 'idanggota', 'idanggota');
    }
}