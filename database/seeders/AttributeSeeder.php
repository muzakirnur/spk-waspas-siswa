<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\NilaiAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Seeder C1 */
        $data1 = Attribute::create([
            'nama' => "Status Ayah",
            'kode' => "C1",
            'bobot' => 20,
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data1->id,
            'value' => "Wafat",
            'nilai' => 99.9
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data1->id,
            'value' => "Bercerai",
            'nilai' => 66.6
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data1->id,
            'value' => "Hidup",
            'nilai' => 33.3
        ]);

        /* Seeder C2 */
        $data2 = Attribute::create([
            'nama' => "Status Ibu",
            'kode' => "C2",
            'bobot' => 20,
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data2->id,
            'value' => "Wafat",
            'nilai' => 100
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data2->id,
            'value' => "Hidup",
            'nilai' => 50
        ]);

        /* Seeder C3 */
        $data3 = Attribute::create([
            'nama' => "Pekerjaan Ayah",
            'kode' => "C3",
            'bobot' => 10,
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data3->id,
            'value' => "Tidak Bekerja",
            'nilai' => 100
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data3->id,
            'value' => "Nelayan",
            'nilai' => 70
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data3->id,
            'value' => "Petani",
            'nilai' => 60
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data3->id,
            'value' => "Lainnya",
            'nilai' => 50
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data3->id,
            'value' => "Wirausaha",
            'nilai' => 40
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data3->id,
            'value' => "Peg. Swasta",
            'nilai' => 20
        ]);
        
        /* Seeder C4 */
        $data4 = Attribute::create([
            'nama' => "Pekerjaan Ibu",
            'kode' => "C4",
            'bobot' => 10,
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data4->id,
            'value' => "Tidak Bekerja",
            'nilai' => 100
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data4->id,
            'value' => "Nelayan",
            'nilai' => 70
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data4->id,
            'value' => "Petani",
            'nilai' => 60
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data4->id,
            'value' => "Lainnya",
            'nilai' => 50
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data4->id,
            'value' => "Wirausaha",
            'nilai' => 40
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data4->id,
            'value' => "Peg. Swasta",
            'nilai' => 20
        ]);

        /* Seeder C5 */
        $data5 = Attribute::create([
            'nama' => "Penghasilan Ayah",
            'kode' => "C5",
            'bobot' => 10,
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Tidak Berpenghasilan",
            'nilai' => 100
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "< Rp. 250.000",
            'nilai' => 95
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 250.001 - Rp. 500.000",
            'nilai' => 90
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 500.001 - Rp. 750.000",
            'nilai' => 85
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 750.001 - Rp. 1.000.000",
            'nilai' => 80
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 1.000.001 - Rp. 1.250.000",
            'nilai' => 75
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 1.250.001 - Rp. 1.500.000",
            'nilai' => 70
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 1.500.001 - Rp. 1.750.000",
            'nilai' => 65
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 1.750.001 - Rp. 2.000.000",
            'nilai' => 60
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 2.000.001 - Rp. 2.250.000",
            'nilai' => 55
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 2.250.001 - Rp. 2.500.000",
            'nilai' => 50
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 2.500.001 - Rp. 2.750.000",
            'nilai' => 45
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 2.750.001 - Rp. 3.000.000",
            'nilai' => 40
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 3.000.001 - Rp. 3.250.000",
            'nilai' => 35
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 3.250.001 - Rp. 3.500.000",
            'nilai' => 30
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 3.500.001 - Rp. 3.750.000",
            'nilai' => 25
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 3.750.001 - Rp. 4.000.000",
            'nilai' => 20
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 4.000.000 - Rp. 4.250.000",
            'nilai' => 15
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 4.250.001 - Rp. 4.500.000",
            'nilai' => 10
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 4.500.001 - Rp. 4.750.000",
            'nilai' => 5
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data5->id,
            'value' => "Rp. 4.750.001 - Rp. 5.000.000",
            'nilai' => 0
        ]);

         /* Seeder C6 */
         $data6 = Attribute::create([
            'nama' => "Penghasilan Ibu",
            'kode' => "C6",
            'bobot' => 10,
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Tidak Berpenghasilan",
            'nilai' => 100
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "< Rp. 250.000",
            'nilai' => 95
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 250.001 - Rp. 500.000",
            'nilai' => 90
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 500.001 - Rp. 750.000",
            'nilai' => 85
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 750.001 - Rp. 1.000.000",
            'nilai' => 80
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 1.000.001 - Rp. 1.250.000",
            'nilai' => 75
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 1.250.001 - Rp. 1.500.000",
            'nilai' => 70
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 1.500.001 - Rp. 1.750.000",
            'nilai' => 65
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 1.750.001 - Rp. 2.000.000",
            'nilai' => 60
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 2.000.001 - Rp. 2.250.000",
            'nilai' => 55
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 2.250.001 - Rp. 2.500.000",
            'nilai' => 50
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 2.500.001 - Rp. 2.750.000",
            'nilai' => 45
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 2.750.001 - Rp. 3.000.000",
            'nilai' => 40
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 3.000.001 - Rp. 3.250.000",
            'nilai' => 35
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 3.250.001 - Rp. 3.500.000",
            'nilai' => 30
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 3.500.001 - Rp. 3.750.000",
            'nilai' => 25
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 3.750.001 - Rp. 4.000.000",
            'nilai' => 20
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 4.000.000 - Rp. 4.250.000",
            'nilai' => 15
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 4.250.001 - Rp. 4.500.000",
            'nilai' => 10
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 4.500.001 - Rp. 4.750.000",
            'nilai' => 5
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data6->id,
            'value' => "Rp. 4.750.001 - Rp. 5.000.000",
            'nilai' => 0
        ]);

        /* Seeder C7 */
        $data7 = Attribute::create([
            'nama' => "Jumlah Tanggungan",
            'kode' => "C7",
            'bobot' => 10,
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "9 Orang",
            'nilai' => 100
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "8 Orang",
            'nilai' => 90
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "7 Orang",
            'nilai' => 80
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "6 Orang",
            'nilai' => 70
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "5 Orang",
            'nilai' => 60
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "4 Orang",
            'nilai' => 50
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "3 Orang",
            'nilai' => 40
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "2 Orang",
            'nilai' => 30
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "1 Orang",
            'nilai' => 20
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data7->id,
            'value' => "Tidak Ada Tanggungan",
            'nilai' => 10
        ]);

        /* Seeder C8 */
        $data8 = Attribute::create([
            'nama' => "Kepemilikan Rumah",
            'kode' => "C8",
            'bobot' => 10,
        ]);

        NilaiAttribute::create([
            'attribute_id' => $data8->id,
            'value' => "Sendiri",
            'nilai' => 100
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data8->id,
            'value' => "Sewa Tahunan",
            'nilai' => 80
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data8->id,
            'value' => "Sewa Bulanan",
            'nilai' => 60
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data8->id,
            'value' => "Menumpang",
            'nilai' => 40
        ]);
        NilaiAttribute::create([
            'attribute_id' => $data8->id,
            'value' => "Tidak Memiliki",
            'nilai' => 20
        ]);
    }
}
