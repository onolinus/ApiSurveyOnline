<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers9cTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers9c', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['pengisian', 'diterima', 'ditolak'])->default('pengisian');
            $table->text('status_comment');
            $table->string('code', 5);
            $table->string('klasifikasi', 250);
            $table->integer('s1_l')->unsigned();
            $table->integer('s1_p')->unsigned();
            $table->integer('s2_l')->unsigned();
            $table->integer('s2_p')->unsigned();
            $table->integer('s3_l')->unsigned();
            $table->integer('s3_p')->unsigned();
            $table->timestamps();
            $table->index(['id_answer', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers9c');
    }
}
