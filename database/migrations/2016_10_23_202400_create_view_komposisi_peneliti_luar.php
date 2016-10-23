<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewKomposisiPenelitiLuar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `komposisi_peneliti_luar` AS
        SELECT
        SUM(jumlah_peneliti_pemerintah) AS `jumlah_peneliti_pemerintah`,
        SUM(jumlah_peneliti_pemerintah)/jumlah_peneliti_luar()*100 AS `percentage_peneliti_pemerintah`,
        SUM(jumlah_peneliti_perguruantinggi) AS `jumlah_peneliti_perguruantinggi`,
        SUM(jumlah_peneliti_perguruantinggi)/jumlah_peneliti_luar()*100 AS `percentage_peneliti_perguruantinggi`,
        SUM(jumlah_peneliti_industri) AS `jumlah_peneliti_industri`,
        SUM(jumlah_peneliti_industri)/jumlah_peneliti_luar()*100 AS `percentage_peneliti_industri`,
        SUM(jumlah_peneliti_lembagaswadaya) AS `jumlah_peneliti_lembagaswadaya`,
        SUM(jumlah_peneliti_lembagaswadaya)/jumlah_peneliti_luar()*100 AS `percentage_peneliti_lembagaswadaya`,
        SUM(jumlah_peneliti_asing) AS `jumlah_peneliti_asing`,
        SUM(jumlah_peneliti_asing)/jumlah_peneliti_luar()*100 AS `percentage_peneliti_asing`,
        jumlah_peneliti_luar() AS `total`
        FROM `answers10`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `komposisi_peneliti_luar`');
    }
}
