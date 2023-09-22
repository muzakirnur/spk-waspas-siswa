<?php

namespace App\Imports;

use App\Models\Finansial;
use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MahasiswaImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $col)
        {
            $mhs = Mahasiswa::create([
                'nim' => $col[25],
                'jenis_kelamin' => $col[7],
                'tempat_lahir' => $col[5],
                'tanggal_lahir' => $col[6],
                'alamat' => $col[8],
                'asal_sekolah' => $col[2],
                'program_studi' => $col[24],
            ]);

            Finansial::create([
                'mahasiswa_id' => $mhs->id,
                'status_ayah' => $col[11],
                'status_ibu' => $col[15],
                'pekerjaan_ayah' => $col[9],
                'pekerjaan_ibu' => $col[13],
                'penghasilan_ayah' => $col[10],
                'pengasilan_ibu' => $col[14],
                'jumlah_tanggungan' => $col[16],
                'kepemilikan_rumah' => $col[17]
            ]);
        }
    }
}
