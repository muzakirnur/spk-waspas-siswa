<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HasilController extends Controller
{
    function index()
    {
        if (request()->ajax()) {
            $hasils = Hasil::query()->with('mahasiswa');
            return DataTables::eloquent($hasils)
                ->order(function($query){
                    $query->orderBy('nilai', 'DESC');
                })
                ->orderColumn('nilai', function($query, $order){
                    $query->orderBy('nilai', $order);
                })
                ->addIndexColumn()
                ->make();
        }
        return view('pages.hasil.index');    
    }

    function export()
    {
        $data = Hasil::query()->with('mahasiswa')->orderBy('nilai', 'DESC')->get();
        $pdf = Pdf::loadView('pdf.export', ['data' => $data]);
        return $pdf->download('hasilPerankingan.pdf');
    }
}
