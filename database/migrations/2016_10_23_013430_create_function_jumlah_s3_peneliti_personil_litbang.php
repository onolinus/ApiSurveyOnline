<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahS3PenelitiPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_s3_peneliti_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_s3_peneliti_personil_litbang double(15,2);
            SET jumlah_s3_peneliti_personil_litbang = (
                    SELECT
                    (
                        SUM(peneliti_fungsional_peneliti_s3_l)
                        +SUM(peneliti_fungsional_peneliti_s3_p)
                        +SUM(peneliti_fungsional_nonpeneliti_s3_l)
                        +SUM(peneliti_fungsional_nonpeneliti_s3_p)
                        +SUM(peneliti_nonfungsional_s3_l)
                        +SUM(peneliti_nonfungsional_s3_p)
                    ) AS `s3`
                    FROM `answers9b`
                );
            return jumlah_s3_peneliti_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_s3_peneliti_personil_litbang`');
    }
}
