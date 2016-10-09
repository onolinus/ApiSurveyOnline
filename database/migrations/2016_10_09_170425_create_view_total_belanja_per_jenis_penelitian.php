<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTotalBelanjaPerJenisPenelitian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `total_belanja_per_jenis_penelitian` AS
        SELECT
        SUM(`penelitian_dasar`) AS `penelitian_dasar`,
        SUM(`penelitian_dasar`)/totalbelanja_per_jenispenelitian()*100 AS `percentage_penelitian_dasar`,
        SUM(`penelitian_terapan`) AS `penelitian_terapan`,
        SUM(`penelitian_terapan`)/totalbelanja_per_jenispenelitian()*100 AS `percentage_penelitian_terapan`,
        SUM(`pengembangan_eksperimental`) AS `pengembangan_eksperimental`,
        SUM(`pengembangan_eksperimental`)/totalbelanja_per_jenispenelitian()*100 AS `percentage_pengembangan_eksperimental`
        FROM `answers7`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `total_belanja_per_jenis_penelitian`');
    }
}
