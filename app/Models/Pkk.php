<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkk extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
        'mulai_tanggal',
        'akhir_tanggal'
    ];
}
