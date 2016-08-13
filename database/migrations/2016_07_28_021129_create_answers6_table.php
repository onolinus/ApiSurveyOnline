<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers6Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers6', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['pengisian', 'diterima', 'ditolak'])->default('pengisian');
            $table->text('status_comment');
            $table->string('code', 5);
            $table->integer('percentage')->unsigned();
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
        Schema::drop('answers6');
    }
}
