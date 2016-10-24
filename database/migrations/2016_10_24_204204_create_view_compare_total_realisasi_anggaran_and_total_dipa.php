<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewCompareTotalRealisasiAnggaranAndTotalDipa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `compare_total_realisasi_anggaran_and_total_dipa` AS
        SELECT
        `nama_lembaga`,
        SUM(`total`) AS `total_realisasi_anggaran`,
        SUM(`dipa_danapemerintah`+`dipa_pnbp_perusahaanswasta`+`dipa_pnbp_instansipemerintah`+`dipa_pnbp_swastanonprofit`+`dipa_pnbp_luarnegeri`+`dipa_phln`) AS `total_dipa`,
        SUM(`dipa_danapemerintah`+`dipa_pnbp_perusahaanswasta`+`dipa_pnbp_instansipemerintah`+`dipa_pnbp_swastanonprofit`+`dipa_pnbp_luarnegeri`+`dipa_phln`)/SUM(`total`)*100 AS `percentage_dipa_from_anggaran`
        FROM `compare_answers1_to_answers3_dipa_per_lembaga`
        GROUP BY `nama_lembaga`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `compare_total_realisasi_anggaran_and_total_dipa`');
    }
}
