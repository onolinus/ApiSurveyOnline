<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewBidangIlmuPeneliti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `bidang_ilmu_peneliti` AS
        SELECT
        `bidang_ilmu`,
        (SUM(s1_l)+SUM(s1_p)) AS `s1`,
        (SUM(s1_l)+SUM(s1_p))/total_peneliti_answers9c()*100 AS `percentage_s1`,
        (SUM(s2_l)+SUM(s2_p)) AS `s2`,
        (SUM(s2_l)+SUM(s2_p))/total_peneliti_answers9c()*100 AS `percentage_s2`,
        (SUM(s3_l)+SUM(s3_p)) AS `s3`,
        (SUM(s3_l)+SUM(s3_p))/total_peneliti_answers9c()*100 AS `percentage_s3`
        FROM `answers9c_complete`
        GROUP BY `bidang_ilmu`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `bidang_ilmu_peneliti`');
    }
}
