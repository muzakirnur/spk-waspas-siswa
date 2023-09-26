<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    function index()
    {
        $data['attributes'] = Attribute::all();
        $data['mahasiswas'] = Mahasiswa::paginate(10);
        return view('pages.perhitungan.index', compact('data'));
    }
}
