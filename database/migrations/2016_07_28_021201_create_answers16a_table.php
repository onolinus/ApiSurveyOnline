<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers16aTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers16a', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['terkirim', 'diterima', 'ditolak'])->default('terkirim');
            $table->text('status_comment');
            $table->integer('usulan_paten')->unsigned();
            $table->integer('usulan_patensederhana')->unsigned();
            $table->integer('disetujui_paten')->unsigned();
            $table->integer('disetujui_patensederhana')->unsigned();
            $table->integer('terkomersialisasi_paten')->unsigned();
            $table->integer('terkomersialisasi_patensederhana')->unsigned();
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
        Schema::drop('answers16a');
    }
}
