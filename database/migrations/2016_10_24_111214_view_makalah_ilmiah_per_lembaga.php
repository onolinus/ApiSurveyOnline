<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ViewMakalahIlmiahPerLembaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `makalah_ilmiah_per_lembaga` AS
        SELECT `area`, `name`,
        SUM(`jumlah`) AS `jumlah`,
        SUM(`jumlah`)/jumlah_jurnal()*100 AS `percentage`
        FROM `answers12_complete`
        GROUP BY `area`, `name`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `makalah_ilmiah_per_lembaga`');
    }
}
