<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers5Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers5', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_correspondent')->unsigned();
            $table->string('code', 5);
            $table->integer('percentage')->unsigned();
            $table->timestamps();
            $table->index(['id_correspondent', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers5');
    }
}
