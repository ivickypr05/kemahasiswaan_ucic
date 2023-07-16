<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrestasiIndividu extends Model
{
    use HasFactory;

    public function categoryprestasi(): BelongsTo
    {
        return $this->belongsTo(CategoryPrestasi::class, 'category_prestasi_id', 'id');
    }
}
