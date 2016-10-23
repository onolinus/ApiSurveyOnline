<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAnswers5Complete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `answers5_complete` AS
        SELECT  `a5`.`id_answer`, `a5`.`percentage`, `a2`.`jumlah`, (`a5`.`percentage` * `a2`.`jumlah`/100) AS `jumlah_percentage`, `rf`.`code`, `rf`.`area`
        FROM `answers5` `a5`
        JOIN `research_fields` `rf` ON `rf`.`code` = `a5`.`code`
        JOIN `answers2` `a2` ON `a2`.`id_answer` = `a5`.`id_answer`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `answers5_complete`');
    }
}
