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
        Schema::table('barangmasuks', function (Blueprint $table) {
            $table->unsignedBigInteger('jenis_barang')->required()->after('kode_barang');
            $table->unsignedBigInteger('nama_barang')->required()->after('jenis_barang');
            $table->unsignedBigInteger('maker')->required()->after('nama_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barangmasuks', function (Blueprint $table) {
            //
        });
    }
};
