<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTotalNondipa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `total_nondipa` AS
            SELECT
            SUM(`nondipa_insentif_ristekdikti`) AS `total_nondipa_insentif_ristekdikti`,
            SUM(`nondipa_insentif_ristekdikti`)/totalnondipa()*100 AS `percentage_total_nondipa_insentif_ristekdikti`,
            SUM(`nondipa_insentif_dalamnegeri`) AS `total_nondipa_insentif_dalamnegeri`,
            SUM(`nondipa_insentif_dalamnegeri`)/totalnondipa()*100 AS `percentage_total_nondipa_insentif_dalamnegeri`,
            SUM(`nondipa_insentif_researchgrant`) AS `total_nondipa_insentif_researchgrant`,
            SUM(`nondipa_insentif_researchgrant`)/totalnondipa()*100 AS `percentage_total_nondipa_insentif_researchgrant`,
            totalnondipa() as `totalnondipa`
            FROM `answers3`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `total_nondipa`');
    }
}
