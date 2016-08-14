<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers16bTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers16b', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['terkirim', 'diterima', 'ditolak'])->default('terkirim');
            $table->text('status_comment');
            $table->integer('jumlah_patenluarnegeri')->unsigned();
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
        Schema::drop('answers16b');
    }
}
