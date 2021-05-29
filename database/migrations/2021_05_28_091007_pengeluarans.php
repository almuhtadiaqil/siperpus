<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengeluarans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_aju_bc23');
            $table->date('no_pendaftaran_23');
            $table->string('no_aju_bc25');
            $table->date('no_pendaftaran_25');
            $table->string('penerima');
            $table->date('invoice');
            $table->date('packing_list');
            $table->string('valuta');
            $table->integer('kurs');
            $table->integer('nilai_cif');
            $table->integer('nilai_barang');
            $table->string('barang');
            $table->date('get_out_start');
            $table->date('get_out_finish');
            $table->integer('jumlah_brg');
            $table->integer('jumlah_kemasan');
            $table->string('jenis_kemasan');
            $table->string('merk_kemasan');
            $table->integer('bruto');
            $table->integer('netto');
            $table->integer('volume');
            $table->softDeletes();
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
        Schema::dropIfExists('pengeluarans');
    }
}


