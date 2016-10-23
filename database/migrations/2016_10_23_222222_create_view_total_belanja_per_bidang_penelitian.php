<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTotalBelanjaPerBidangPenelitian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `total_belanja_per_bidang_penelitian` AS
        SELECT area, SUM(jumlah_percentage) AS `jumlah`, SUM(jumlah_percentage)/jumlahbelanja()*100 AS `percentage`
        FROM answers5_complete
        GROUP BY area');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `total_belanja_per_bidang_penelitian`');
    }
}
