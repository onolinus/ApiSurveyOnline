<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahLisensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_lisensi() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_lisensi double(15,2);
            SET jumlah_lisensi = (
                    SELECT(
                        COUNT(`id`)
                    ) FROM `answers17`
                );
            return jumlah_lisensi;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_lisensi`');
    }
}
