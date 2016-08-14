<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers13', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['terkirim', 'diterima', 'ditolak'])->default('terkirim');
            $table->text('status_comment');
            $table->string('nama_peneliti', 250);
            $table->string('negara_penyelenggara_seminar', 250);
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
        Schema::drop('answers13');
    }
}
