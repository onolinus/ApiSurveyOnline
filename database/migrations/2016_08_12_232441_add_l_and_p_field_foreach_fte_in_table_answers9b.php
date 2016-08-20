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

            $table->float('peneliti_fungsional_peneliti_s1_fte_l')->after('peneliti_fungsional_peneliti_s1_p');
            $table->float('peneliti_fungsional_peneliti_s1_fte_p')->after('peneliti_fungsional_peneliti_s1_fte_l');
            $table->float('peneliti_fungsional_peneliti_s2_fte_l')->after('peneliti_fungsional_peneliti_s2_p');
            $table->float('peneliti_fungsional_peneliti_s2_fte_p')->after('peneliti_fungsional_peneliti_s2_fte_l');
            $table->float('peneliti_fungsional_peneliti_s3_fte_l')->after('peneliti_fungsional_peneliti_s3_p');
            $table->float('peneliti_fungsional_peneliti_s3_fte_p')->after('peneliti_fungsional_peneliti_s3_fte_l');

            $table->float('peneliti_fungsional_nonpeneliti_s1_fte_l')->after('peneliti_fungsional_nonpeneliti_s1_p');
            $table->float('peneliti_fungsional_nonpeneliti_s1_fte_p')->after('peneliti_fungsional_nonpeneliti_s1_fte_l');
            $table->float('peneliti_fungsional_nonpeneliti_s2_fte_l')->after('peneliti_fungsional_nonpeneliti_s2_p');
            $table->float('peneliti_fungsional_nonpeneliti_s2_fte_p')->after('peneliti_fungsional_nonpeneliti_s2_fte_l');
            $table->float('peneliti_fungsional_nonpeneliti_s3_fte_l')->after('peneliti_fungsional_nonpeneliti_s3_p');
            $table->float('peneliti_fungsional_nonpeneliti_s3_fte_p')->after('peneliti_fungsional_nonpeneliti_s3_fte_l');

            $table->float('peneliti_nonfungsional_s1_fte_l')->after('peneliti_nonfungsional_s1_p');
            $table->float('peneliti_nonfungsional_s1_fte_p')->after('peneliti_nonfungsional_s1_fte_l');
            $table->float('peneliti_nonfungsional_s2_fte_l')->after('peneliti_nonfungsional_s2_p');
            $table->float('peneliti_nonfungsional_s2_fte_p')->after('peneliti_nonfungsional_s2_fte_l');
            $table->float('peneliti_nonfungsional_s3_fte_l')->after('peneliti_nonfungsional_s3_p');
            $table->float('peneliti_nonfungsional_s3_fte_p')->after('peneliti_nonfungsional_s3_fte_l');

            $table->float('teknisi_s1_fte_l')->after('teknisi_s1_p');
            $table->float('teknisi_s1_fte_p')->after('teknisi_s1_fte_l');
            $table->float('teknisi_d3_fte_l')->after('teknisi_d3_p');
            $table->float('teknisi_d3_fte_p')->after('teknisi_d3_fte_l');
            $table->float('teknisi_belowd3_fte_l')->after('teknisi_belowd3_p');
            $table->float('teknisi_belowd3_fte_p')->after('teknisi_belowd3_fte_l');

            $table->float('staffpendukung_s1_fte_l')->after('staffpendukung_s1_p');
            $table->float('staffpendukung_s1_fte_p')->after('staffpendukung_s1_fte_l');
            $table->float('staffpendukung_d3_fte_l')->after('staffpendukung_d3_p');
            $table->float('staffpendukung_d3_fte_p')->after('staffpendukung_d3_fte_l');
            $table->float('staffpendukung_belowd3_fte_l')->after('staffpendukung_belowd3_p');
            $table->float('staffpendukung_belowd3_fte_p')->after('staffpendukung_belowd3_fte_l');

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
