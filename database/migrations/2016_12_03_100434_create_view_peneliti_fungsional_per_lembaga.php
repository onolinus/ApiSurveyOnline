<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewPenelitiFungsionalPerLembaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `jumlah_peneliti_fungsional_per_lembaga` AS
        SELECT (
                        SUM(peneliti_fungsional_peneliti_s1_l)
                        +SUM(peneliti_fungsional_peneliti_s1_p)
                        +SUM(peneliti_fungsional_peneliti_s2_l)
                        +SUM(peneliti_fungsional_peneliti_s2_p)
                        +SUM(peneliti_fungsional_peneliti_s3_l)
                        +SUM(peneliti_fungsional_peneliti_s3_p)
                    ) AS `jumlah_peneliti_fungsional`,
                    (
                    	SUM(peneliti_fungsional_peneliti_s1_l)
                        +SUM(peneliti_fungsional_peneliti_s1_p)
                        +SUM(peneliti_fungsional_peneliti_s2_l)
                        +SUM(peneliti_fungsional_peneliti_s2_p)
                        +SUM(peneliti_fungsional_peneliti_s3_l)
                        +SUM(peneliti_fungsional_peneliti_s3_p)
                     )/jumlah_peneliti_fungsional_personil_litbang() * 100 AS `percentage`,
                    `lembaga`.`id` AS `id_lembaga`,
					`lembaga`.`name` AS `nama_lembaga`,
					`lembaga`.`type` AS `tipe_lembaga`
                    FROM `answers9b`
                    JOIN `answers` ON `answers`.`id` = `answers9b`.`id_answer`
                    JOIN `correspondents` ON `correspondents`.`user_id` = `answers`.`id_correspondent`
                    JOIN `approved_by` ON `approved_by`.`correspondent_id_approved` = `correspondents`.`user_id`
                    JOIN `lembaga` ON `lembaga`.`id` = `approved_by`.`id_lembaga`
                    GROUP BY `lembaga`.`id`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `jumlah_peneliti_fungsional_per_lembaga`');
    }
}
