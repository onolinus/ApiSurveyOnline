<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahJurnal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_jurnal() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_jurnal double(15,2);
            SET jumlah_jurnal = (
                    SELECT(
                        SUM(`jumlah`)
                    ) FROM `answers12`
                );
            return jumlah_jurnal;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_jurnal`');
    }
}
