<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahD3TeknisiPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_d3_teknisi_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_d3_teknisi_personil_litbang double(15,2);
            SET jumlah_d3_teknisi_personil_litbang = (
                    SELECT(
                        SUM(teknisi_d3_l)
                        +SUM(teknisi_d3_p)
                    ) AS `d3`
                    FROM `answers9b`
                );
            return jumlah_d3_teknisi_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_d3_teknisi_personil_litbang`');
    }
}
