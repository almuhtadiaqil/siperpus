<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pemasukans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengajuan');
            $table->date('no_pendaftaran');
            $table->string('pemasok');
            $table->date('invoice');
            $table->string('bl');
            $table->string('valuta');
            $table->float('kurs', 25);
            $table->float('nilai_cif', 25);
            $table->float('nilai_barang', 25);
            $table->string('barang');
            $table->date('tgl_msk_start');
            $table->date('tgl_msk_finish');
            $table->integer('jumlah_brg');
            $table->integer('jumlah_kemasan');
            $table->string('jenis_kemasan');
            $table->string('merk_kemasan');
            $table->float('bruto', 25);
            $table->float('netto', 25);
            $table->float('volume', 25);
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
        Schema::dropIfExists('pemasukans');
    }
}
