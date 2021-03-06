<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahS1StaffpendukungPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_s1_staffpendukung_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_s1_staffpendukung_personil_litbang double(15,2);
            SET jumlah_s1_staffpendukung_personil_litbang = (
                    SELECT(
                        SUM(staffpendukung_s1_l)
                        +SUM(staffpendukung_s1_p)
                    ) AS `s1`
                    FROM `answers9b`
                );
            return jumlah_s1_staffpendukung_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_s1_staffpendukung_personil_litbang`');
    }
}
