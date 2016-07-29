<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers3', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_correspondent')->unsigned();
            $table->double('dipa_danapemerintah', 15, 8);
            $table->double('dipa_pnbp', 15, 8);
            $table->double('dipa_phln', 15, 8);
            $table->double('danaluar_swasta', 15, 8);
            $table->double('danaluar_pemerintah', 15, 8);
            $table->double('danaluar_nonprofit', 15, 8);
            $table->double('danaluar_luarnegeri', 15, 8);
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
        Schema::drop('answers3');
    }
}
