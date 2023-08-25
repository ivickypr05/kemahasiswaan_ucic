<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hima extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'nama_kegiatan',
        'nama_himpunan',
        'gambar',
        'deskripsi',
        'mulai_tanggal',
        'akhir_tanggal',
        'status'
    ];
}
