<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'gambar',
        'dari_tanggal',
        'sampai_tanggal'
    ];
}
