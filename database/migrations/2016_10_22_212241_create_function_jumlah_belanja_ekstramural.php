<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahBelanjaEkstramural extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlahbelanja_ekstramural() RETURNS double(15,2)
        BEGIN
            DECLARE jumlahbelanja_ekstramural double(15,2);
            SET jumlahbelanja_ekstramural = (
                SELECT SUM(`a8`.`jumlah_dana`) AS `total`
		        FROM `answers8` `a8`);
            return jumlahbelanja_ekstramural;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlahbelanja_ekstramural`');
    }
}
