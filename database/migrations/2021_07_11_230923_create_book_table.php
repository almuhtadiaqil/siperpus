<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul_buku');
            $table->string('nomor_buku');
            $table->bigInteger('id_kategori')->unsigned();
            $table->string('pengarang');
            $table->bigInteger('id_penerbit')->unsigned();
            $table->string('cover');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')
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
        Schema::dropIfExists('book');
    }
}
