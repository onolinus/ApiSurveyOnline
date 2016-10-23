<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewSentAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `sent_answers` AS
            SELECT `lembaga`.*, COUNT(`answers`.`id`) as `count`
            FROM `lembaga`
            LEFT JOIN `approved_by` ON `approved_by`.`id_lembaga` = `lembaga`.`id`
            LEFT JOIN `correspondents` ON `correspondents`.`user_id` = `approved_by`.`correspondent_id_approved`
            LEFT JOIN `users` ON `users`.`id` = `correspondents`.`user_id` AND `users`.`type` = \'correspondent\'
            LEFT JOIN `answers` ON `answers`.`id_correspondent` = `correspondents`.`user_id`
            GROUP BY `lembaga`.`id`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `sent_answers`');
    }
}
