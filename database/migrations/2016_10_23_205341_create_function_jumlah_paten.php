<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahPaten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_paten() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_paten double(15,2);
            SET jumlah_paten = (
                    SELECT(
                        SUM(`usulan_paten`)
                        +SUM(`disetujui_paten`)
                        +SUM(`terkomersialisasi_paten`)
                    ) FROM `answers16a`
                );
            return jumlah_paten;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_paten`');
    }
}
