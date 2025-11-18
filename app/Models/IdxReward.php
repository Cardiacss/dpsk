<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdxReward extends Model
{
    use HasFactory;

    protected $table = 'idxreward';
    protected $primaryKey = 'tgl';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'tgl',
        'indexrw',
    ];

    protected $casts = [
        'tgl' => 'date',
        'indexrw' => 'float',
    ];
}
