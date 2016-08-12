<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLAndPFieldForeachFteInTableAnswers9b extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers9b', function ($table) {

            $table->dropColumn([
                'peneliti_fungsional_peneliti_s1_fte',
                'peneliti_fungsional_peneliti_s2_fte',
                'peneliti_fungsional_peneliti_s3_fte',
                'peneliti_fungsional_nonpeneliti_s1_fte',
                'peneliti_fungsional_nonpeneliti_s2_fte',
                'peneliti_fungsional_nonpeneliti_s3_fte',
                'peneliti_nonfungsional_s1_fte',
                'peneliti_nonfungsional_s2_fte',
                'peneliti_nonfungsional_s3_fte',
                'teknisi_s1_fte',
                'teknisi_d3_fte',
                'teknisi_belowd3_fte',
                'staffpendukung_s1_fte',
                'staffpendukung_d3_fte',
                'staffpendukung_belowd3_fte',
            ]);

            $table->integer('peneliti_fungsional_peneliti_s1_fte_l')->unsigned()->after('peneliti_fungsional_peneliti_s1_p');
            $table->integer('peneliti_fungsional_peneliti_s1_fte_p')->unsigned()->after('peneliti_fungsional_peneliti_s1_fte_l');
            $table->integer('peneliti_fungsional_peneliti_s2_fte_l')->unsigned()->after('peneliti_fungsional_peneliti_s2_p');
            $table->integer('peneliti_fungsional_peneliti_s2_fte_p')->unsigned()->after('peneliti_fungsional_peneliti_s2_fte_l');
            $table->integer('peneliti_fungsional_peneliti_s3_fte_l')->unsigned()->after('peneliti_fungsional_peneliti_s3_p');
            $table->integer('peneliti_fungsional_peneliti_s3_fte_p')->unsigned()->after('peneliti_fungsional_peneliti_s3_fte_l');

            $table->integer('peneliti_fungsional_nonpeneliti_s1_fte_l')->unsigned()->after('peneliti_fungsional_nonpeneliti_s1_p');
            $table->integer('peneliti_fungsional_nonpeneliti_s1_fte_p')->unsigned()->after('peneliti_fungsional_nonpeneliti_s1_fte_l');
            $table->integer('peneliti_fungsional_nonpeneliti_s2_fte_l')->unsigned()->after('peneliti_fungsional_nonpeneliti_s2_p');
            $table->integer('peneliti_fungsional_nonpeneliti_s2_fte_p')->unsigned()->after('peneliti_fungsional_nonpeneliti_s2_fte_l');
            $table->integer('peneliti_fungsional_nonpeneliti_s3_fte_l')->unsigned()->after('peneliti_fungsional_nonpeneliti_s3_p');
            $table->integer('peneliti_fungsional_nonpeneliti_s3_fte_p')->unsigned()->after('peneliti_fungsional_nonpeneliti_s3_fte_l');

            $table->integer('peneliti_nonfungsional_s1_fte_l')->unsigned()->after('peneliti_nonfungsional_s1_p');
            $table->integer('peneliti_nonfungsional_s1_fte_p')->unsigned()->after('peneliti_nonfungsional_s1_fte_l');
            $table->integer('peneliti_nonfungsional_s2_fte_l')->unsigned()->after('peneliti_nonfungsional_s2_p');
            $table->integer('peneliti_nonfungsional_s2_fte_p')->unsigned()->after('peneliti_nonfungsional_s2_fte_l');
            $table->integer('peneliti_nonfungsional_s3_fte_l')->unsigned()->after('peneliti_nonfungsional_s3_p');
            $table->integer('peneliti_nonfungsional_s3_fte_p')->unsigned()->after('peneliti_nonfungsional_s3_fte_l');

            $table->integer('teknisi_s1_fte_l')->unsigned()->after('teknisi_s1_p');
            $table->integer('teknisi_s1_fte_p')->unsigned()->after('teknisi_s1_fte_l');
            $table->integer('teknisi_d3_fte_l')->unsigned()->after('teknisi_d3_p');
            $table->integer('teknisi_d3_fte_p')->unsigned()->after('teknisi_d3_fte_l');
            $table->integer('teknisi_belowd3_fte_l')->unsigned()->after('teknisi_belowd3_p');
            $table->integer('teknisi_belowd3_fte_p')->unsigned()->after('teknisi_belowd3_fte_l');

            $table->integer('staffpendukung_s1_fte_l')->unsigned()->after('staffpendukung_s1_p');
            $table->integer('staffpendukung_s1_fte_p')->unsigned()->after('staffpendukung_s1_fte_l');
            $table->integer('staffpendukung_d3_fte_l')->unsigned()->after('staffpendukung_d3_p');
            $table->integer('staffpendukung_d3_fte_p')->unsigned()->after('staffpendukung_d3_fte_l');
            $table->integer('staffpendukung_belowd3_fte_l')->unsigned()->after('staffpendukung_belowd3_p');
            $table->integer('staffpendukung_belowd3_fte_p')->unsigned()->after('staffpendukung_belowd3_fte_l');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
