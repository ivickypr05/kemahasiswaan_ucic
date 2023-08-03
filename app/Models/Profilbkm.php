<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilbkm extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'struktur_bkm',
        'deskripsi'
    ];
}
