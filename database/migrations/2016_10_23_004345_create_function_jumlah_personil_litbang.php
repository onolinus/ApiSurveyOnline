<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_personil_litbang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_personil_litbang double(15,2);
            SET jumlah_personil_litbang = (
                    SELECT
                    (
                        jumlah_peneliti_personil_litbang()
                        +jumlah_teknisi_personil_litbang()
                        +jumlah_staffpendukung_personil_litbang()
                    ) AS `jumlah`
                );
            return jumlah_personil_litbang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_personil_litbang`');
    }
}
