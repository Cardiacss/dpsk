<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPeraturan extends Model
{
    use HasFactory;

    // Nama tabel (jika tidak mengikuti konvensi jamak)
    protected $table = 'tperaturan';
    protected $primaryKey = 'idperaturan';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [
        'skepentingan',
        'namaperaturan',
        'sesuai',
    ];
}
