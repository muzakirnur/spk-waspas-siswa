<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finansials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained();
            $table->string('status_ayah');
            $table->string('status_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->integer('penghasilan_ayah');
            $table->integer('penghasilan_ibu');
            $table->integer('jumlah_tanggungan');
            $table->string('kepemilikan_rumah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finansials');
    }
};
