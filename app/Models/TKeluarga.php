<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKeluarga extends Model
{
    use HasFactory;

    protected $table = 't_keluarga';
    protected $primaryKey = 'idkeluarga';
    public $timestamps = false;

    protected $fillable = [
        'idkeluarga',
        'idanggota',
        'nm_keluarga',
        'jeniskelamin',
        'tempatlahir',
        'tgllahir',
        'pekerjaan',
        'hubungan',
        'keterangan_kel',
        'statuswaris',
        'nosuratnikah',
        'nosuratcerai',
        'notunjukwaris',
        'nomohonwaris',
        'jenisubah',
        'tglubah',
        'statushidup',
        'tgltunjukwaris',
        'tglmohonwaris',
        'bolehwaris',
    ];

    protected $casts = [
        'tglLahir' => 'date',
        'tglubah' => 'date',
        'tgltunjukwaris' => 'date',
        'tglmohonwaris' => 'date',
        'statushidup' => 'boolean',
    ];

    // Relasi ke peserta
    public function peserta()
    {
        return $this->belongsTo(TPeserta::class, 'idanggota', 'idanggota');
    }
}
