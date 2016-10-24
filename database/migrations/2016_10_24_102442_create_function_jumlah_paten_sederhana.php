<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahPatenSederhana extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_paten_sederhana() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_paten_sederhana double(15,2);
            SET jumlah_paten_sederhana = (
                    SELECT(
                        SUM(`usulan_patensederhana`)
                        +SUM(`disetujui_patensederhana`)
                        +SUM(`terkomersialisasi_patensederhana`)
                    ) FROM `answers16a`
                );
            return jumlah_paten_sederhana;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_paten_sederhana`');
    }
}
