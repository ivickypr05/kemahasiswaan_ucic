<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strukturhima extends Model
{
    use HasFactory;
    protected $fillable = [
        'struktur_himatif',
        'struktur_himasi',
        'struktur_himami',
        'struktur_himadkv',
        'struktur_himaka',
        'struktur_himaku',
        'struktur_himajemen',
        'struktur_himabis',
    ];
}
