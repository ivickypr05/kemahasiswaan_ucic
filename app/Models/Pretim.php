<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pretim extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'nama_1',
        'nama_2',
        'nama_3',
        'nama_4',
        'nama_5',
        'nama_6',
        'nama_7',
        'nama_8',
        'nama_9',
        'nama_10',
        'nama_11',
        'tingkat_kejuaraan',
        'gambar_1',
        'gambar_2',
        'gambar_3',
        'deskripsi',
        'tanggal',
        'category_id'
    ];
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
