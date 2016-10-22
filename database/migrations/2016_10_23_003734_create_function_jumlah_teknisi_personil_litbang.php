<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahTeknisiPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_teknisi_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_teknisi_personil_litbang double(15,2);
            SET jumlah_teknisi_personil_litbang = (
                    SELECT
                    (
                        SUM(teknisi_s1_l)
                        +SUM(teknisi_s1_p)
                        +SUM(teknisi_s1_fte_l)
                        +SUM(teknisi_s1_fte_p)
                        +SUM(teknisi_d3_l)
                        +SUM(teknisi_d3_p)
                        +SUM(teknisi_d3_fte_l)
                        +SUM(teknisi_d3_fte_p)
                        +SUM(teknisi_belowd3_l)
                        +SUM(teknisi_belowd3_p)
                        +SUM(teknisi_belowd3_fte_l)
                        +SUM(teknisi_belowd3_fte_p)
                    ) AS `teknisi`
                    FROM `answers9b`
                );
            return jumlah_teknisi_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_teknisi_personil_litbang`');
    }
}
