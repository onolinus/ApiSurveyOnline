<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers15aTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers15a', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['terkirim', 'diterima', 'ditolak'])->default('terkirim');
            $table->text('status_comment');
            $table->string('nama_barang', 250);
            $table->boolean('terkomersialisasi');
            $table->integer('tahun')->unsigned();
            $table->timestamps();
            $table->index(['id_answer']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers15a');
    }
}
