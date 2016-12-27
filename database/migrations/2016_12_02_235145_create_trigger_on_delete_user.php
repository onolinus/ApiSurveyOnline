<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerOnDeleteUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('CREATE TRIGGER trigger_on_delete_user AFTER DELETE ON `users` FOR EACH ROW
        BEGIN
            DECLARE id_answer int(10);

	        UPDATE `registrasi_tokens` SET `user_id` = 0 WHERE `user_id` = OLD.id;

            DELETE FROM `correspondents` WHERE `user_id` = OLD.id;
            DELETE FROM `approved_by` WHERE `correspondent_id_approved` = OLD.id;

            SET id_answer = (SELECT `id` FROM `answers` WHERE `id_correspondent` = OLD.id);
            DELETE FROM `answers` WHERE `id` = id_answer;
            DELETE FROM `answers1` WHERE `id_answer` = id_answer;
            DELETE FROM `answers2` WHERE `id_answer` = id_answer;
            DELETE FROM `answers3` WHERE `id_answer` = id_answer;
            DELETE FROM `answers4` WHERE `id_answer` = id_answer;
            DELETE FROM `answers5` WHERE `id_answer` = id_answer;
            DELETE FROM `answers6` WHERE `id_answer` = id_answer;
            DELETE FROM `answers7` WHERE `id_answer` = id_answer;
            DELETE FROM `answers8` WHERE `id_answer` = id_answer;
            DELETE FROM `answers9a` WHERE `id_answer` = id_answer;
            DELETE FROM `answers9b` WHERE `id_answer` = id_answer;
            DELETE FROM `answers9c` WHERE `id_answer` = id_answer;
            DELETE FROM `answers10` WHERE `id_answer` = id_answer;
            DELETE FROM `answers11` WHERE `id_answer` = id_answer;
            DELETE FROM `answers12` WHERE `id_answer` = id_answer;
            DELETE FROM `answers13` WHERE `id_answer` = id_answer;
            DELETE FROM `answers14` WHERE `id_answer` = id_answer;
            DELETE FROM `answers15a` WHERE `id_answer` = id_answer;
            DELETE FROM `answers15b` WHERE `id_answer` = id_answer;
            DELETE FROM `answers16a` WHERE `id_answer` = id_answer;
            DELETE FROM `answers16b` WHERE `id_answer` = id_answer;
            DELETE FROM `answers17` WHERE `id_answer` = id_answer;
            DELETE FROM `answers18` WHERE `id_answer` = id_answer;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `trigger_on_delete_user`');
    }
}
