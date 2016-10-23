<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionTotalnondipa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION totalnondipa() RETURNS double(15,2)
        BEGIN
            DECLARE totalnondipa double(15,2);
            SET totalnondipa = (SELECT SUM(`nondipa_insentif_ristekdikti`) + SUM(`nondipa_insentif_dalamnegeri`) + SUM(`nondipa_insentif_researchgrant`) AS `totalnondipa` FROM `answers3`);
            return totalnondipa;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `totalnondipa`');
    }
}
