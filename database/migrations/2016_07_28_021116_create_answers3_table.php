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
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['terkirim', 'diterima', 'ditolak'])->default('terkirim');
            $table->text('status_comment');

            $table->double('dipa_danapemerintah', 15, 2);

            $table->double('dipa_pnbp_perusahaanswasta', 15, 2);
            $table->double('dipa_pnbp_instansipemerintah', 15, 2);
            $table->double('dipa_pnbp_swastanonprofit', 15, 2);
            $table->double('dipa_pnbp_luarnegeri', 15, 2);

            $table->double('dipa_phln', 15, 2);

            $table->double('nondipa_insentif_ristekdikti', 15, 2);
            $table->double('nondipa_insentif_dalamnegeri', 15, 2);
            $table->double('nondipa_insentif_researchgrant', 15, 2);

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
        Schema::drop('answers3');
    }
}
