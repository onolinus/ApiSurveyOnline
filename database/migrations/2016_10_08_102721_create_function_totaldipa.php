<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionTotaldipa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION totaldipa() RETURNS double(15,2)
        BEGIN
            DECLARE totaldipa double(15,2);
            SET totaldipa = (SELECT SUM(`dipa_danapemerintah`) + SUM(`dipa_pnbp_perusahaanswasta`) + SUM(`dipa_pnbp_instansipemerintah`) + SUM(`dipa_pnbp_swastanonprofit`) + SUM(`dipa_pnbp_luarnegeri`) + SUM(`dipa_phln`) AS `totaldipa` FROM `answers3`);
            return totaldipa;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::unprepared('DROP FUNCTION `totaldipa`');
    }
}
