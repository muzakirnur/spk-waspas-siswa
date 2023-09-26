<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    function getFinancial()
    {
        $data = Finansial::query()->with('nilaiAttribute')->where('mahasiswa_id', $this->id)->get();
        return $data;
    }
}
