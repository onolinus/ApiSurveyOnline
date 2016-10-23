<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FunctionJumlahLembaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlahbelanja() RETURNS double(15,2)
        BEGIN
            DECLARE jumlahbelanja double(15,2);
            SET jumlahbelanja = (SELECT SUM(`jumlah`) AS `jumlahbelanja` FROM `answers2`);
            return jumlahbelanja;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlahbelanja`');
    }
}
