<?php

use Illuminate\Database\Migrations\Migration;

class CreateViewCountUserLembaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `count_user_per_lembaga` AS
        SELECT lembaga.*, COUNT(users.id) as `count`
        FROM `lembaga`
        LEFT JOIN `approved_by` ON `approved_by`.`id_lembaga` = `lembaga`.`id`
        LEFT JOIN `correspondents` ON `correspondents`.`user_id` = `approved_by`.`correspondent_id_approved`
        LEFT JOIN `users` ON `users`.`id` = `correspondents`.`user_id` AND `users`.`type` = \'correspondent\'
        GROUP BY `lembaga`.`id`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `count_user_per_lembaga`');
    }
}
