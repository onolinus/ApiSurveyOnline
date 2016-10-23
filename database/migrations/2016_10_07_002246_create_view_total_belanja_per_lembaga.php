<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTotalBelanjaPerLembaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `total_belanja_per_lembaga` AS
        SELECT `lembaga`.*, SUM(`answers1`.`total`) as `total`
        FROM `lembaga`
        LEFT JOIN `approved_by` ON `approved_by`.`id_lembaga` = `lembaga`.`id`
        LEFT JOIN `answers` ON `answers`.`id_correspondent` = `approved_by`.`correspondent_id_approved`
        LEFT JOIN `answers1` ON `answers1`.`id_answer` = `answers`.`id`
        GROUP BY `lembaga`.`id`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `total_belanja_per_lembaga`');
    }
}
