<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAnswers12Complete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `answers12_complete` AS
        SELECT `a12`.*, `rf`.`area`, `l`.`name`, `l`.`type`
        FROM `answers12` `a12`
        JOIN `research_fields` `rf` ON `rf`.`code` = `a12`.`code`
        JOIN `answers` `a` ON `a`.`id` = `a12`.`id_answer`
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
        DB::unprepared('DROP VIEW `answers12_complete`');
    }
}
