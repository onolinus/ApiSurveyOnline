<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewCompareTotalDipaNondipa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `compare_total_dipa_nondipa` AS
        SELECT
        totaldipa() AS `totaldipa`,
        totaldipa()/totalbelanja_per_sumberdana() AS `percentage_totaldipa`,
        totalnondipa() AS `totalnondipa`,
        totalnondipa()/totalbelanja_per_sumberdana() AS `percentage_totalnondipa`,
        totalbelanja_per_sumberdana() AS `total`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `compare_total_dipa_nondipa`');
    }
}
