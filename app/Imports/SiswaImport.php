<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Attribute;
use App\Models\NilaiSiswa;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        try{
            $attribute = Attribute::query()->get();
            foreach($collection as $row){
                if($row['nama'] != null){
                    $siswa = Mahasiswa::create([
                        'no_reg' => $row['no_reg'],
                        'nama' => $row['nama'],
                        'jenis_kelamin' => $row['jenis_kelamin'],
                        'asal_kelas' => $row['asal_kelas'],
                    ]);
                    foreach($attribute as $kriteria){
                        NilaiSiswa::create([
                            'mahasiswa_id' => $siswa->id,
                            'attribute_id' => $kriteria->id,
                            'nilai' => $row[strtolower(preg_replace('/\s+/', '_', $kriteria->nama))],
                        ]);
                    }
                }
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
