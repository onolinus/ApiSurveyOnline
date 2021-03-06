<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahBelowd3StaffpendukungPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_belowd3_staffpendukung_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_belowd3_staffpendukung_personil_litbang double(15,2);
            SET jumlah_belowd3_staffpendukung_personil_litbang = (
                    SELECT(
                        SUM(staffpendukung_belowd3_l)
                        +SUM(staffpendukung_belowd3_p)
                    ) AS `belowd3`
                    FROM `answers9b`
                );
            return jumlah_belowd3_staffpendukung_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_belowd3_staffpendukung_personil_litbang`');
    }
}
