<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAnswers6Complete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `answers6_complete` AS
        SELECT  `a6`.`id_answer`, `a6`.`percentage`, `a2`.`jumlah`, (`a6`.`percentage` * `a2`.`jumlah`/100) AS `jumlah_percentage`, `so`.`code`, `so`.`division`
        FROM `answers6` `a6`
        JOIN `socio_economics` `so` ON `so`.`code` = `a6`.`code`
        JOIN `answers2` `a2` ON `a2`.`id_answer` = `a6`.`id_answer`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `answers6_complete`');
    }
}
