<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahTeknisiS1PerempuanPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_teknisi_s1_perempuan_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_teknisi_s1_perempuan_personil_litbang double(15,2);
            SET jumlah_teknisi_s1_perempuan_personil_litbang = (
                    SELECT (
                        SUM(teknisi_s1_p)
                    ) AS `jumlah_teknisi_s1_perempuan_personil_litbang`
                    FROM `answers9b`
                );
            return jumlah_teknisi_s1_perempuan_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_teknisi_s1_perempuan_personil_litbang`');
    }
}
