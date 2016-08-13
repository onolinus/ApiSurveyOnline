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
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['pengisian', 'diterima', 'ditolak'])->default('pengisian');
            $table->text('status_comment');
            $table->string('nama_jasa', 250);
            $table->string('pengguna_jasa', 250);
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
        Schema::drop('answers15b');
    }
}
