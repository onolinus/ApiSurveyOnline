<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahStaffpendukungPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_staffpendukung_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_staffpendukung_personil_litbang double(15,2);
            SET jumlah_staffpendukung_personil_litbang = (
                    SELECT
                    (
                        SUM(staffpendukung_s1_l)
                        +SUM(staffpendukung_s1_p)
                        +SUM(staffpendukung_s1_fte_l)
                        +SUM(staffpendukung_s1_fte_p)
                        +SUM(staffpendukung_d3_l)
                        +SUM(staffpendukung_d3_p)
                        +SUM(staffpendukung_d3_fte_l)
                        +SUM(staffpendukung_d3_fte_p)
                        +SUM(staffpendukung_belowd3_l)
                        +SUM(staffpendukung_belowd3_p)
                        +SUM(staffpendukung_belowd3_fte_l)
                        +SUM(staffpendukung_belowd3_fte_p)
                    ) AS `staffpendukung`
                    FROM `answers9b`
                );
            return jumlah_staffpendukung_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_staffpendukung_personil_litbang`');
    }
}
