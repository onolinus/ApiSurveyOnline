<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionTotalPenelitiAnswers9c extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION total_peneliti_answers9c() RETURNS double(15,2)
        BEGIN
            DECLARE total_peneliti_answers9c double(15,2);
            SET total_peneliti_answers9c = (
                    SELECT (
                        SUM(s1_l)
                        +SUM(s2_p)
                        +SUM(s2_l)
                        +SUM(s1_p)
                        +SUM(s3_l)
                        +SUM(s3_p)
                    ) AS `total`
                    FROM answers9c
                );
            return total_peneliti_answers9c;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `total_peneliti_answers9c`');
    }
}
