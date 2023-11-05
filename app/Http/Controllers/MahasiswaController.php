<?php

namespace App\Http\Controllers;

use App\Imports\MahasiswaImport;
use App\Models\Attribute;
use App\Models\Finansial;
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
                ->addColumn('edit', '<a href="{{route("mahasiswa.show", $id)}}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white mr-2">
                <i class="fa-solid fa-eye"></i></a><button onclick="showModals({{$id}})" class="btn bg-red-600 hover:bg-red-700 text-white">
                <i class="fa-solid fa-trash"></i></button>')
                ->rawColumns(['edit'])
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
        $request->validate(['excel' => ['required', 'file', 'mimes:csv,xlsx,xls']]);
        Excel::import(new MahasiswaImport, $request->file('excel'));
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil diimport!');
    }

    function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('pages.mahasiswa.show', compact('mahasiswa'));
    }

    function destroy(Request $request):void
    {
        $mahasiswa = Mahasiswa::findOrFail($request->id);
        $financials = Finansial::query()->where('mahasiswa_id', $mahasiswa->id)->get();
        foreach($financials as $financial){
            $financial->delete();
        }
        $mahasiswa->delete();
    }
}
