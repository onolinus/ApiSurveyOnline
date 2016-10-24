<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAnswers11Complete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `answers11_complete` AS
        SELECT `a11`.*, `rf`.`area`, `l`.`name`, `l`.`type`
        FROM `answers11` `a11`
        JOIN `research_fields` `rf` ON `rf`.`code` = `a11`.`code`
        JOIN `answers` `a` ON `a`.`id` = `a11`.`id_answer`
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
        DB::unprepared('DROP VIEW `answers11_complete`');
    }
}
