<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSukuBunga extends Model
{
    use HasFactory;

    protected $table = 't_sukubunga';
    protected $primaryKey = 'tahun'; 
    public $incrementing = false; 
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'peserta',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'peserta' => 'float',
    ];
}
