<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahPenelitiLuar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_peneliti_luar() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_peneliti_luar double(15,2);
            SET jumlah_peneliti_luar = (
                    SELECT(
                        SUM(jumlah_peneliti_pemerintah)
                        +SUM(jumlah_peneliti_perguruantinggi)
                        +SUM(jumlah_peneliti_industri)
                        +SUM(jumlah_peneliti_lembagaswadaya)
                        +SUM(jumlah_peneliti_asing)
                    ) FROM `answers10`
                );
            return jumlah_peneliti_luar;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_peneliti_luar`');
    }
}
