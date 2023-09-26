<?php

use App\Http\Controllers\AttributeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiAttributeController;

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
    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('mahasiswa/create', [MahasiswaController::class, 'save'])->name('mahasiswa.save');
    Route::get('mahasiswa/show/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

    /* Route for Attribute */
    Route::get('attribute', [AttributeController::class, 'index'])->name('attribute.index');
    Route::get('attribute/create', [AttributeController::class, 'create'])->name('attribute.create');
    Route::post('attribute/create', [AttributeController::class, 'save'])->name('attribute.save');
    Route::get('attribute/edit/{id}', [AttributeController::class, 'edit'])->name('attribute.edit');
    Route::put('attribute/edit/{id}', [AttributeController::class, 'update'])->name('attribute.update');
    Route::get('attribute/delete/{id}', [AttributeController::class, 'delete'])->name('attribute.delete');

    /* Route for Nilai Attribute */
    Route::get('nilai-attribute', [NilaiAttributeController::class, 'index'])->name('nilai-attribute.index');
    Route::get('nilai-attribute/create/{id}', [NilaiAttributeController::class, 'create'])->name('nilai-attribute.create');
    Route::post('nilai-attribute/create/{id}', [NilaiAttributeController::class, 'save'])->name('nilai-attribute.save');
    Route::get('nilai-attribute/edit/{id}', [NilaiAttributeController::class, 'edit'])->name('nilai-attribute.edit');
    Route::put('nilai-attribute/edit/{id}', [NilaiAttributeController::class, 'update'])->name('nilai-attribute.update');
    Route::post('nilai-attribute/delete', [NilaiAttributeController::class, 'delete'])->name('nilai-attribute.delete');

    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});