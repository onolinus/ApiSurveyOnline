<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAnswers9cComplete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `answers9c_complete` AS
        SELECT `a9c`.*, `bi`.`bidang_ilmu`
        FROM `answers9c` `a9c`
        JOIN `klasifikasi_bidang_ilmu` `bi` ON `bi`.`code` = `a9c`.`code`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `answers9c_complete`');
    }
}
