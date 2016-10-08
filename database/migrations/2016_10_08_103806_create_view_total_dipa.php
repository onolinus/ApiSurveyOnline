<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTotalDipa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `total_dipa` AS
            SELECT
            SUM(`dipa_danapemerintah`) AS `total_dipa_danapemerintah`,
            SUM(`dipa_danapemerintah`)/totaldipa()*100 AS `percentage_total_dipa_danapemerintah`,
            SUM(`dipa_pnbp_perusahaanswasta`) AS `total_dipa_pnbp_perusahaanswasta`,
            SUM(`dipa_pnbp_perusahaanswasta`)/totaldipa()*100 AS `percentage_total_dipa_pnbp_perusahaanswasta`,
            SUM(`dipa_pnbp_instansipemerintah`) AS `total_dipa_pnbp_instansipemerintah`,
            SUM(`dipa_pnbp_instansipemerintah`)/totaldipa()*100 AS `percentage_total_dipa_pnbp_instansipemerintah`,
            SUM(`dipa_pnbp_swastanonprofit`) AS `total_dipa_pnbp_swastanonprofit`,
            SUM(`dipa_pnbp_swastanonprofit`)/totaldipa()*100 AS `percentage_total_dipa_pnbp_swastanonprofit`,
            SUM(`dipa_pnbp_luarnegeri`) AS `total_dipa_pnbp_luarnegeri`,
            SUM(`dipa_pnbp_luarnegeri`)/totaldipa()*100 AS `percentage_total_dipa_pnbp_luarnegeri`,
            SUM(`dipa_phln`) AS `total_dipa_phln`,
            SUM(`dipa_phln`)/totaldipa()*100 AS `percentage_total_dipa_phln`,
            totaldipa() AS `totaldipa`
            FROM `answers3`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `total_dipa`');
    }
}
