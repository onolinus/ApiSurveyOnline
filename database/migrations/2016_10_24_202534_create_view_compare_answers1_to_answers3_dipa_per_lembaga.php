<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewCompareAnswers1ToAnswers3DipaPerLembaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `compare_answers1_to_answers3_dipa_per_lembaga` AS
        SELECT
        `a1`.`total`,
        `a3`.`dipa_danapemerintah`,
        `a3`.`dipa_pnbp_perusahaanswasta`,
        `a3`.`dipa_pnbp_instansipemerintah`,
        `a3`.`dipa_pnbp_swastanonprofit`,
        `a3`.`dipa_pnbp_luarnegeri`,
        `a3`.`dipa_phln`,
        `l`.`name` AS `nama_lembaga`,
        `l`.`type` AS `tipe_lembaga`
        FROM `answers1` `a1`
        JOIN `answers3` `a3` ON `a3`.`id_answer` = `a1`.`id_answer`
        JOIN `answers` `a` ON `a`.`id` = `a3`.`id_answer`
        JOIN `correspondents` `c` ON `c`.`user_id` = `a`.`id_correspondent`
        JOIN `approved_by` `ab` ON `ab`.`correspondent_id_approved` = `c`.`user_id`
        JOIN `lembaga` `l` ON `l`.`id` = `ab`.`id_lembaga`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `compare_answers1_to_answers3_dipa_per_lembaga`');
    }
}
