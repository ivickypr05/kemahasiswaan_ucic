<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryPrestasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];
    public function prestasiindividu(): HasMany
    {
        return $this->hasMany(PrestasiIndividu::class, 'category_prestasi_id', 'id');
    }
    public function prestasitim(): HasMany
    {
        return $this->hasMany(PrestasiTim::class, 'category_prestasi_id', 'id');
    }
}
