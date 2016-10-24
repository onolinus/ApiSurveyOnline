<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewJumlahLisensiPerLembaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `jumlah_lisensi_per_lembaga` AS
        SELECT `name`,
        COUNT(`id`) AS `jumlah`,
        COUNT(`id`)/jumlah_lisensi()*100 AS `percentage`
        FROM `answers17_complete`
        GROUP BY `name`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `jumlah_lisensi_per_lembaga`');
    }
}
