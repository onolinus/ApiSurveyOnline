<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahStaffpendukungBelowd3LakilakiPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_staffpendukung_belowd3_lakilaki_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_staffpendukung_belowd3_lakilaki_personil_litbang double(15,2);
            SET jumlah_staffpendukung_belowd3_lakilaki_personil_litbang = (
                    SELECT (
                        SUM(staffpendukung_belowd3_l)
                    ) AS `jumlah_staffpendukung_belowd3_lakilaki_personil_litbang`
                    FROM `answers9b`
                );
            return jumlah_staffpendukung_belowd3_lakilaki_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_staffpendukung_belowd3_lakilaki_personil_litbang`');
    }
}
