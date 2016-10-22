<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionTotalPelaksanaBelanjaEkstramural extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION total_pelaksana_belanja_ekstramural() RETURNS double(15,2)
        BEGIN
            DECLARE total_pelaksana_belanja_ekstramural double(15,2);
            SET total_pelaksana_belanja_ekstramural = (
                    SELECT (
                        SUM(`jumlah_peneliti_pemerintah`)
                        + SUM(`jumlah_peneliti_perguruantinggi`)
                        + SUM(`jumlah_peneliti_industri`)
                        + SUM(`jumlah_peneliti_lembagaswadaya`)
                        + SUM(`jumlah_peneliti_asing`)
                        ) AS `total`
                    FROM `answers10`
                );
            return total_pelaksana_belanja_ekstramural;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `total_pelaksana_belanja_ekstramural`');
    }
}
