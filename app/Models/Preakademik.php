<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Preakademik extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'nama',
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
