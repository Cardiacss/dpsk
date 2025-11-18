<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TNilaiAktuaria extends Model
{
    use HasFactory;

    protected $table = 't_nilaiaktuaria';
    protected $primaryKey = 'idaktuaria';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'thnaktuaria',
        'idunit',
        'ip',
        'ipk',
        'blnberlaku',
        'thnberlaku',
        'nilaitambahan',
    ];

    protected $casts = [
        'ip' => 'float',
        'ipk' => 'float',
        'blnberlaku' => 'integer',
        'thnberlaku' => 'integer',
        'nilaitambahan' => 'float',
    ];

    public function unit()
    {
        return $this->belongsTo(TUnitMitra::class, 'idunit', 'idunit');
    }
}
