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
        Schema::create('barangmasuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 10);
            $table->foreign('kode_barang')->references('kode_barang')->on('barangs');
            $table->string('supplier', 100);
            $table->date('tanggal_masuk');
            $table->integer('jumlah');
            $table->string('keterangan', 100);
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
        Schema::dropIfExists('barangmasuks');
    }
};
