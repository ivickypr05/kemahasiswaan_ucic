<?php

namespace App\Models;


use App\Models\Preakademik;
use App\Models\Prenonakademik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];
    public function preakademik(): HasMany
    {
        return $this->hasMany(Preakademik::class, 'category_id', 'id');
    }
    public function prenonakademik(): HasMany
    {
        return $this->hasMany(Prenonakademik::class, 'category_id', 'id');
    }
}
