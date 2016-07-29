<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers9bTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers9b', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_correspondent')->unsigned();

            $table->integer('peneliti_fungsional_peneliti_s1_l')->unsigned();
            $table->integer('peneliti_fungsional_peneliti_s1_p')->unsigned();
            $table->integer('peneliti_fungsional_peneliti_s1_fte')->unsigned();
            $table->integer('peneliti_fungsional_peneliti_s2_l')->unsigned();
            $table->integer('peneliti_fungsional_peneliti_s2_p')->unsigned();
            $table->integer('peneliti_fungsional_peneliti_s2_fte')->unsigned();
            $table->integer('peneliti_fungsional_peneliti_s3_l')->unsigned();
            $table->integer('peneliti_fungsional_peneliti_s3_p')->unsigned();
            $table->integer('peneliti_fungsional_peneliti_s3_fte')->unsigned();

            $table->integer('peneliti_fungsional_nonpeneliti_s1_l')->unsigned();
            $table->integer('peneliti_fungsional_nonpeneliti_s1_p')->unsigned();
            $table->integer('peneliti_fungsional_nonpeneliti_s1_fte')->unsigned();
            $table->integer('peneliti_fungsional_nonpeneliti_s2_l')->unsigned();
            $table->integer('peneliti_fungsional_nonpeneliti_s2_p')->unsigned();
            $table->integer('peneliti_fungsional_nonpeneliti_s2_fte')->unsigned();
            $table->integer('peneliti_fungsional_nonpeneliti_s3_l')->unsigned();
            $table->integer('peneliti_fungsional_nonpeneliti_s3_p')->unsigned();
            $table->integer('peneliti_fungsional_nonpeneliti_s3_fte')->unsigned();

            $table->integer('peneliti_nonfungsional_s1_l')->unsigned();
            $table->integer('peneliti_nonfungsional_s1_p')->unsigned();
            $table->integer('peneliti_nonfungsional_s1_fte')->unsigned();
            $table->integer('peneliti_nonfungsional_s2_l')->unsigned();
            $table->integer('peneliti_nonfungsional_s2_p')->unsigned();
            $table->integer('peneliti_nonfungsional_s2_fte')->unsigned();
            $table->integer('peneliti_nonfungsional_s3_l')->unsigned();
            $table->integer('peneliti_nonfungsional_s3_p')->unsigned();
            $table->integer('peneliti_nonfungsional_s3_fte')->unsigned();

            $table->integer('teknisi_s1_l')->unsigned();
            $table->integer('teknisi_s1_p')->unsigned();
            $table->integer('teknisi_s1_fte')->unsigned();
            $table->integer('teknisi_d3_l')->unsigned();
            $table->integer('teknisi_d3_p')->unsigned();
            $table->integer('teknisi_d3_fte')->unsigned();
            $table->integer('teknisi_belowd3_l')->unsigned();
            $table->integer('teknisi_belowd3_p')->unsigned();
            $table->integer('teknisi_belowd3_fte')->unsigned();

            $table->integer('staffpendukung_s1_l')->unsigned();
            $table->integer('staffpendukung_s1_p')->unsigned();
            $table->integer('staffpendukung_s1_fte')->unsigned();
            $table->integer('staffpendukung_d3_l')->unsigned();
            $table->integer('staffpendukung_d3_p')->unsigned();
            $table->integer('staffpendukung_d3_fte')->unsigned();
            $table->integer('staffpendukung_belowd3_l')->unsigned();
            $table->integer('staffpendukung_belowd3_p')->unsigned();
            $table->integer('staffpendukung_belowd3_fte')->unsigned();

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
        Schema::drop('answers9b');
    }
}
