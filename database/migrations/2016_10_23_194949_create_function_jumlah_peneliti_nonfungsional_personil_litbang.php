<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahPenelitiNonfungsionalPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_peneliti_nonfungsional_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_peneliti_nonfungsional_personil_litbang double(15,2);
            SET jumlah_peneliti_nonfungsional_personil_litbang = (
                    SELECT (
                        SUM(peneliti_nonfungsional_s1_l)
                        +SUM(peneliti_nonfungsional_s1_p)
                        +SUM(peneliti_nonfungsional_s2_l)
                        +SUM(peneliti_nonfungsional_s2_p)
                        +SUM(peneliti_nonfungsional_s3_l)
                        +SUM(peneliti_nonfungsional_s3_p)
                    ) AS `jumlah_peneliti_nonfungsional_personil_litbang`
                    FROM `answers9b`
                );
            return jumlah_peneliti_nonfungsional_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_peneliti_nonfungsional_personil_litbang`');
    }
}
