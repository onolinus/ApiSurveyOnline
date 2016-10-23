<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionTotalBelanjaPerJenisPenelitian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION totalbelanja_per_jenispenelitian() RETURNS double(15,2)
        BEGIN
            DECLARE totalbelanja_per_jenispenelitian double(15,2);
            SET totalbelanja_per_jenispenelitian = (SELECT SUM(`penelitian_dasar`) + SUM(`penelitian_terapan`) + SUM(`pengembangan_eksperimental`) FROM `answers7`);
            return totalbelanja_per_jenispenelitian;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `totalbelanja_per_jenispenelitian`');
    }
}
