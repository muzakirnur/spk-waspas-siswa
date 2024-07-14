<?php

namespace App\Repository;

use App\Models\Mahasiswa;
use App\Models\Attribute;
use App\Models\Hasil;
use Illuminate\Validation\ValidationException;

class WaspasRepository
{   
    public static function waspasCalculation(Mahasiswa $student): void
    {
        $attribute = Attribute::query()->get();
        $multiplication = [];
        $pow = [];
        foreach($attribute as $kriteria){
            $nilai = $student->nilaiSiswa->where('attribute_id', $kriteria->id)->first()?->calculateMatriks($kriteria);
            $multiplication[$kriteria->id] = WaspasRepository::calculateEachAttributeMultiplication($kriteria, $nilai);
            $pow[$kriteria->id] = WaspasRepository::calculateEachAttributePowersOfNumber($kriteria, $nilai);
        }
        $totalMultiplication = WaspasRepository::totalMultiplication($multiplication);
        $totalPow = WaspasRepository::totalPow($pow);
        $nilaiAkhir = WaspasRepository::calculateResult($totalMultiplication, $totalPow);
        WaspasRepository::saveResult($nilaiAkhir, $student);
    }

    public static function calculateEachAttributeMultiplication(Attribute $attribute, float $nilai): float
    {
        return $nilai * $attribute->bobot;
    }

    public static function calculateEachAttributePowersOfNumber(Attribute $attribute, float $nilai): float
    {
        return pow($nilai, $attribute->bobot);
    }

    public static function totalMultiplication(array $multiplication): float
    {
        return array_sum($multiplication);
    }

    public static function totalPow(array $pow): float
    {
        $multiplicationOfPow = 0;
        for($i=0;$i<count($pow);$i++){
            if($multiplicationOfPow == 0){
                $multiplicationOfPow = 1 * $pow[$i+1];
            }else{
                $multiplicationOfPow = $multiplicationOfPow * $pow[$i+1];
            }
        }
        return $multiplicationOfPow;
    }

    public static function calculateResult(float $multi, float $pow): float
    {
        $finalTotalMulti = 0.5 * $multi;
        $finalTotalPow = 0.5 * $pow;
        $nilaiAkhir = $finalTotalMulti + $finalTotalPow;
        return $nilaiAkhir;
    }

    public static function saveResult(float $nilai, Mahasiswa $siswa): void
    {
        try{
            Hasil::create([
                'nilai' => $nilai,
                'mahasiswa_id' => $siswa->id,
            ]);
        }catch(\Exception $e){
            throw ValidationException::withMessages([$e->getMessage()]);
        }
    }

}