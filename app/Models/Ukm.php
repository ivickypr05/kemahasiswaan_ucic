<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kegiatan',
        'nama_ukm',
        'gambar',
        'deskripsi',
        'dari_tanggal',
        'sampai_tanggal',

    ];
}
