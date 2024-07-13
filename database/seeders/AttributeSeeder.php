<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Nilai Raport IPA',
            'Nilai Raport IPS',
            'Nilai Raport Agama',
            'Nilai Tes IPA',
            'Nilai Tes IPS',
            'Nilai Tes Agama',
            'Nilai Tes B. Indonesia',
            'Nilai Tes B. Inggris',
            'Nilai Praktek Sholat',
            "Nilai Praktek Baca Al-Qur'an",
            'Nilai Praktek Hafalan Surat Pendek'
        ];

        $bobot = [
            0.13,
            0.11,
            0.11,
            0.15,
            0.13,
            0.13,
            0.06,
            0.06,
            0.04,
            0.04,
            0.04
        ];
        $count = 0;
        foreach($data as $row){
            Attribute::create([
                'nama' => $row,
                'kode' => 'C'.$count+1,
                'bobot' => $bobot[$count],
            ]);
            $count++;
        }
    }
}
