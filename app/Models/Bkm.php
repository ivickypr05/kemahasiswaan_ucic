<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bkm extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kegiatan',
        'gambar',
        'deskripsi',
        'mulai_tanggal',
        'akhir_tanggal',
        'status'
    ];
}
