<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $guarded = [];

    function getAllNilaiAttribute()
    {
        $data = NilaiAttribute::query()->where('attribute_id', $this->id)->get();
        return $data;
    }
}
