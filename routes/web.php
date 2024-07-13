<?php

use App\Http\Controllers\AttributeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiAttributeController;
use App\Http\Controllers\PerhitunganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /* Route for Mahasiswa */
    Route::get('siswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('siswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('siswa/create', [MahasiswaController::class, 'save'])->name('mahasiswa.save');
    Route::get('siswa/show/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
    Route::post('siswa/delete', [MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');

    /* Route for Attribute */
    Route::get('kriteria', [AttributeController::class, 'index'])->name('attribute.index');
    Route::get('kriteria/create', [AttributeController::class, 'create'])->name('attribute.create');
    Route::post('kriteria/create', [AttributeController::class, 'save'])->name('attribute.save');
    Route::get('kriteria/edit/{id}', [AttributeController::class, 'edit'])->name('attribute.edit');
    Route::put('kriteria/edit/{id}', [AttributeController::class, 'update'])->name('attribute.update');
    Route::get('kriteria/delete/{id}', [AttributeController::class, 'delete'])->name('attribute.delete');

    /* Route for Nilai Attribute */
    // Route::get('nilai-attribute', [NilaiAttributeController::class, 'index'])->name('nilai-attribute.index');
    // Route::get('nilai-attribute/create/{id}', [NilaiAttributeController::class, 'create'])->name('nilai-attribute.create');
    // Route::post('nilai-attribute/create/{id}', [NilaiAttributeController::class, 'save'])->name('nilai-attribute.save');
    // Route::get('nilai-attribute/edit/{id}', [NilaiAttributeController::class, 'edit'])->name('nilai-attribute.edit');
    // Route::put('nilai-attribute/edit/{id}', [NilaiAttributeController::class, 'update'])->name('nilai-attribute.update');
    // Route::post('nilai-attribute/delete', [NilaiAttributeController::class, 'delete'])->name('nilai-attribute.delete');

    /* Route for Hasil */
    Route::get('hasil', [HasilController::class, 'index'])->name('hasil.index');
    Route::get('hasil/export', [HasilController::class, 'export'])->name('hasil.export');

    /* Route for Perhitungan SMART */
    Route::get('perhitungan',[PerhitunganController::class, 'index'])->name('perhitungan.index');
    Route::post('perhitungan/save', [PerhitunganController::class, 'save'])->name('perhitungan.save');

    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});