<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers15bTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers15b', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_correspondent')->unsigned();
            $table->string('nama_barang', 250);
            $table->boolean('terkomersialisasi');
            $table->integer('tahun')->unsigned();
            $table->timestamps();
            $table->index(['id_correspondent']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers15b');
    }
}
