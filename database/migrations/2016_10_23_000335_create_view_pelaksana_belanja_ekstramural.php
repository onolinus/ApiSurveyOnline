<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewPelaksanaBelanjaEkstramural extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `pelaksana_belanja_ekstramural` AS
        SELECT
        SUM(`jumlah_peneliti_pemerintah`) AS `jumlah_peneliti_pemerintah`,
        SUM(`jumlah_peneliti_pemerintah`)/total_pelaksana_belanja_ekstramural() * 100 AS `percentage_jumlah_peneliti_pemerintah`,
        SUM(`jumlah_peneliti_perguruantinggi`) AS `jumlah_peneliti_perguruantinggi`,
        SUM(`jumlah_peneliti_perguruantinggi`)/total_pelaksana_belanja_ekstramural() * 100 AS `percentage_jumlah_peneliti_perguruantinggi`,
        SUM(`jumlah_peneliti_industri`) AS `jumlah_peneliti_industri`,
        SUM(`jumlah_peneliti_industri`)/total_pelaksana_belanja_ekstramural() * 100 AS `percentage_jumlah_peneliti_industri`,
        SUM(`jumlah_peneliti_lembagaswadaya`) AS `jumlah_peneliti_lembagaswadaya`,
        SUM(`jumlah_peneliti_lembagaswadaya`)/total_pelaksana_belanja_ekstramural() * 100 AS `percentage_jumlah_peneliti_lembagaswadaya`,
        SUM(`jumlah_peneliti_asing`) AS `jumlah_peneliti_asing`,
        SUM(`jumlah_peneliti_asing`)/total_pelaksana_belanja_ekstramural() * 100 AS `percentage_jumlah_peneliti_asing`,
        total_pelaksana_belanja_ekstramural() AS `total`
        FROM `answers10`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `pelaksana_belanja_ekstramural`');
    }
}
