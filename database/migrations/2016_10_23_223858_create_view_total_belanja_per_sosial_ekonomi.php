<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTotalBelanjaPerSosialEkonomi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `total_belanja_per_sosial_ekonomi` AS
        SELECT division, SUM(jumlah_percentage) AS `jumlah`, SUM(jumlah_percentage)/jumlahbelanja()*100 AS `percentage`
        FROM answers6_complete
        GROUP BY division');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `total_belanja_per_sosial_ekonomi`');
    }
}
