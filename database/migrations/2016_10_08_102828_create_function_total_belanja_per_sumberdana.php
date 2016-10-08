<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionTotalBelanjaPerSumberdana extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION totalbelanja_per_sumberdana() RETURNS double(15,2)
        BEGIN
            DECLARE totalbelanja_per_sumberdana double(15,2);
            SET totalbelanja_per_sumberdana = totaldipa() + totalnondipa();
            return totalbelanja_per_sumberdana;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `totalbelanja_per_sumberdana`');
    }
}
