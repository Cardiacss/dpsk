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

    protected $fillable = [
        'idmanfaatpensiun',
        'idanggota',
        'tglbermanfaat',
        'thn_setor',
        'bln_setor',
        'nilai_mp',
        'keterangan',
    ];

    protected $casts = [
        'tglbermanfaat' => 'date',
        'nilai_mp' => 'decimal:2',
    ];

    // Relasi ke peserta
    public function peserta()
    {
        return $this->belongsTo(TPeserta::class, 'idanggota', 'idanggota');
    }
}
