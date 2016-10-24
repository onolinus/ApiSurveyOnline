<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAnswers17Complete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `answers17_complete` AS
        SELECT `a17`.*, `l`.`name`, `l`.`type`
        FROM `answers17` `a17`
        JOIN `answers` `a` ON `a`.`id` = `a17`.`id_answer`
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
        DB::unprepared('DROP VIEW `answers17_complete`');
    }
}
