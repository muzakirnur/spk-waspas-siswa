<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NilaiSiswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class);
    }

    public function calculateMatriks(Attribute $attribute)
    {
        $max = $this->where('attribute_id', $attribute->id)->max('poin');
        return $this->nilai/$max;
    }
}
