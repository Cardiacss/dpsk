<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPeserta extends Model
{
    use HasFactory;

    protected $table = 't_peserta';
    protected $primaryKey = 'idanggota';
    public $timestamps = false; // tidak ada created_at & updated_at

    protected $fillable = [
        'nopeserta',
        'nama',
        'tempatlahir',
        'tgllahir',
        'jeniskelamin',
        'alamatterakhir',
        'kelurahan',
        'kecamatan',
        'kotakab',
        'provinsi',
        'pkerjaanakhir',
        'idmitra',
        'idunit',
        'tmtkeja',
        'noskkeja1',
        'statusnikah',
        'tglmohon',
        'tglsahpeserta',
        'staushiduo',
        'statuspeserta',
        'id_num',
        'first_bulan',
        'first_tahun',
        'last_bulan',
        'last_tahun',
        'doot',
        'jumlahanak',
        'cetak',
        'tgltiuran',
        'tglkawin',
    ];

    // Contoh accessor (jika ingin format tanggal otomatis)
    protected $casts = [
        'tglahir' => 'date',
        'tmtekja' => 'date',
        'tglmohon' => 'date',
        'tglsahpeserta' => 'date',
        'tgltiuran' => 'date',
        'tglkawin' => 'date',
    ];

    // Contoh relasi jika ada tabel lain
    public function unit()
    {
        return $this->belongsTo(TUnitMitra::class, 'idunit', 'idunit');
    }
}
