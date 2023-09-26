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

    function nilaiUtility()
    {
        $getNilaiByAttribute = NilaiAttribute::query()->where('attribute_id', $this->nilaiAttribute->attribute_id)->get();
        $maxNilai = floatval($getNilaiByAttribute->max('nilai'));
        $nilaiUtility = (($maxNilai - $this->nilai) / (100-0)) * 100;
        return $nilaiUtility;
    }
}
