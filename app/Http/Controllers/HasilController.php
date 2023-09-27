<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
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
                    $query->orderBy('nilai', 'ASC');
                })
                ->orderColumn('nilai', function($query, $order){
                    $query->orderBy('nilai', $order);
                })
                ->addIndexColumn()
                ->make();
        }
        return view('pages.hasil.index');    
    }
}
