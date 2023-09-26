<?php

namespace App\Http\Controllers;

use App\Imports\MahasiswaImport;
use App\Models\Attribute;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $mahasiswas = Mahasiswa::query();
            return DataTables::eloquent($mahasiswas)
                ->make();
        }
        return view('pages.mahasiswa.index');
    }

    function create()
    {
        return view('pages.mahasiswa.create');    
    }

    function save(Request $request)
    {
        Excel::import(new MahasiswaImport, $request->file('excel'));
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil diimport!');
    }
}
