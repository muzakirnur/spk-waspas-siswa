<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Hasil;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    function index()
    {
        $checkHasil = Hasil::count();
        if($checkHasil > 0){
            return redirect()->route('hasil.index')->with('error', 'Hasil perangkingan sudah disimpan!');
        }
        $data['attributes'] = Attribute::all();
        $data['mahasiswas'] = Mahasiswa::paginate(10);
        return view('pages.perhitungan.index', compact('data'));
    }

    function save()
    {
        $mahasiswas = Mahasiswa::all();
        foreach ($mahasiswas as $mahasiswa){
            Hasil::create([
                'mahasiswa_id' => $mahasiswa->id,
                'nilai' => floatval($mahasiswa->countAllUtility()),
            ]);
        }
        return redirect()->route('hasil.index')->with('success', 'Hasil perangkingan disimpan!');
    }
}
