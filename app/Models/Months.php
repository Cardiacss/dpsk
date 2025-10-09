<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Months extends Model
{
    use HasFactory;

    protected $table = 'months';
    public $timestamps = false;

    protected $fillable = [
        'mnth',
        'yr',
    ];

    protected $casts = [
        'mnth' => 'integer',
        'yr' => 'integer',
    ];
}
