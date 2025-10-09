<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TFaktorNilai extends Model
{
    use HasFactory;

    protected $table = 't_faktornilaii';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'umur',
        'statuskerja',
        'fns_s_pria_kawin',
        'fns_s_wanita_kawin',
        'fns_b_pria_kawin',
        'fns_b_wanita_kawin',
        'fns_s_pria_lajang',
        'fns_s_wanita_lajang',
        'fns_b_pria_lajang',
        'fns_b_wanita_lajang',
    ];

    protected $casts = [
        'umur' => 'integer',
        'fns_s_pria_kawin' => 'float',
        'fns_s_wanita_kawin' => 'float',
        'fns_b_pria_kawin' => 'float',
        'fns_b_wanita_kawin' => 'float',
        'fns_s_pria_lajang' => 'float',
        'fns_s_wanita_lajang' => 'float',
        'fns_b_pria_lajang' => 'float',
        'fns_b_wanita_lajang' => 'float',
    ];
}
