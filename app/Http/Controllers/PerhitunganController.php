<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Hasil;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Repository\WaspasRepository;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    function index()
    {
        $checkHasil = Hasil::count();
        $data['attributes'] = Attribute::query()->get();
        $data['mahasiswas'] = Mahasiswa::paginate(10);
        return view('pages.perhitungan.index', compact('data', 'checkHasil'));
    }

    function save()
    {
        $jurusan = Jurusan::count();
        if($jurusan == 0){
            return redirect()->back()->with('error', 'Harap isi Jurusan!');
        }
        $mahasiswas = Mahasiswa::query()->get();
        foreach($mahasiswas as $siswa){
            WaspasRepository::waspasCalculation($siswa);
        }
        return redirect()->route('hasil.index')->with('success', 'Hasil perangkingan disimpan!');
    }
}
