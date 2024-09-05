<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\HasilQi;
use App\Models\Jurusan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HasilController extends Controller
{
    function index()
    {
        $jurusans = Jurusan::query()->orderBy('priority', 'asc')->get();
        foreach($jurusans as $jurusan){
            $data[$jurusan->id] = Hasil::query()->where('jurusan_id', $jurusan->id)->paginate(10);
        }
        return view('pages.hasil.index', compact('jurusans', 'data'));    
    }

    function export()
    {
        $quota = [];
        $jurusan = Jurusan::query()->orderBy('priority', 'asc')->get();
        for($i=0;$i<count($jurusan);$i++){
            if(count($quota) == 0){
                $array = [
                    'id' => $jurusan[$i]->id,
                    'start' => 1,
                    'end' => $jurusan[$i]->quota,
                ];
            }else{
                $prevArray = $quota[$i-1];
                $array = [
                    'id' => $jurusan[$i]->id,
                    'start' => $prevArray['end'] +1,
                    'end' => $prevArray['end'] + $jurusan[$i]->quota,
                ];
            }
            $quota[$i] = $array;
        }
        $data = Hasil::query()->with('mahasiswa')->orderBy('nilai', 'DESC')->get();
        $pdf = Pdf::loadView('pdf.export', ['data' => $data, 'quota' => $quota, 'jurusan' => $jurusan]);
        return $pdf->download('hasilPerankingan.pdf');
    }
}
