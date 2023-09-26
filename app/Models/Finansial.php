<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Finansial extends Model
{
    use HasFactory;

    protected $guarded = [];

    function nilaiAttribute():BelongsTo
    {
        return $this->belongsTo(NilaiAttribute::class);
    }
}
