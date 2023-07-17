<?php

namespace App\Models;

use App\Models\Pretim;
use App\Models\Preindividu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];
    public function preindividu(): HasMany
    {
        return $this->hasMany(Preindividu::class, 'category_id', 'id');
    }
    public function pretim(): HasMany
    {
        return $this->hasMany(Pretim::class, 'category_id', 'id');
    }
}
