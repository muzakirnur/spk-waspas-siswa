<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Mahasiswa;
use App\Repository\WaspasRepository;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function siswa(Request $request)
    {
        $data = Mahasiswa::query()->with('hasil', 'nilaiSiswa')->when($request->siswa, function($query, $siswa){
            return $query->where('nama', 'LIKE', '%'.$siswa.'%');
        })->first();
        if(!$data){
            return redirect()->route('home')->with('error', 'Data tidak ditemukan!');
        }
        $jurusan = WaspasRepository::getJurusanById($data);
        return view('pages.frontend.siswa.index', compact('data', 'jurusan'));
    }

    public function result()
    {
        return view('pages.frontend.result.index');
    }
}
