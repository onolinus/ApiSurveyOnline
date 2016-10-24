<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahJurnalNasional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_jurnal_nasional() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_jurnal_nasional double(15,2);
            SET jumlah_jurnal_nasional = (
                    SELECT(
                        SUM(`jumlah`)
                    ) FROM `answers11`
                );
            return jumlah_jurnal_nasional;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_jurnal_nasional`');
    }
}
