<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strukturukm extends Model
{
    use HasFactory;
    protected $fillable = [
        'struktur_esport',
        'struktur_futsal',
        'struktur_badminton',
        'struktur_musik',
        'struktur_nusantari'
    ];
}
