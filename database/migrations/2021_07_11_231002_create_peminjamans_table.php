<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->bigInteger('id_buku')->unsigned();
            $table->string('nama_peminjam');
            $table->integer('umur_peminjam');
            $table->string('pekerjaan');
            $table->string('alamat_rumah');
            $table->string('alamat_instansi');
            $table->string('status');
            $table->date('waktu_peminjaman');
            $table->date('waktu_pengembalian');
            $table->timestamps();
        });

        Schema::table('peminjamans', function (Blueprint $table) {
            $table->foreign('id_buku')->references('id_buku')->on('books')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamans');
    }
}
