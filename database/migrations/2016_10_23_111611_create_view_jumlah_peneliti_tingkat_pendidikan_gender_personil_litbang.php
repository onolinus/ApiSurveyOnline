<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewJumlahPenelitiTingkatPendidikanGenderPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `personil_peneliti_tingkat_pendidikan_gender` AS
        SELECT
        jumlah_peneliti_s1_lakilaki_personil_litbang() AS `jumlah_peneliti_s1_l_personil_litbang`,
        jumlah_peneliti_s1_lakilaki_personil_litbang()/jumlah_peneliti_personil_litbang()*100 AS `percentage_jumlah_peneliti_s1_l_personil_litbang`,
        jumlah_peneliti_s1_perempuan_personil_litbang() AS `jumlah_peneliti_s1_p_personil_litbang`,
        jumlah_peneliti_s1_perempuan_personil_litbang()/jumlah_peneliti_personil_litbang()*100 AS `percentage_jumlah_peneliti_s1_p_personil_litbang`,
        jumlah_peneliti_s2_lakilaki_personil_litbang() AS `jumlah_peneliti_s2_l_personil_litbang`,
        jumlah_peneliti_s2_lakilaki_personil_litbang()/jumlah_peneliti_personil_litbang()*100 AS `percentage_jumlah_peneliti_s2_l_personil_litbang`,
        jumlah_peneliti_s2_perempuan_personil_litbang() AS `jumlah_peneliti_s2_p_personil_litbang`,
        jumlah_peneliti_s2_perempuan_personil_litbang()/jumlah_peneliti_personil_litbang()*100 AS `percentage_jumlah_peneliti_s2_p_personil_litbang`,
        jumlah_peneliti_s3_lakilaki_personil_litbang() AS `jumlah_peneliti_s3_l_personil_litbang`,
        jumlah_peneliti_s3_lakilaki_personil_litbang()/jumlah_peneliti_personil_litbang()*100 AS `percentage_jumlah_peneliti_s3_l_personil_litbang`,
        jumlah_peneliti_s3_perempuan_personil_litbang() AS `jumlah_peneliti_s3_p_personil_litbang`,
        jumlah_peneliti_s3_perempuan_personil_litbang()/jumlah_peneliti_personil_litbang()*100 AS `percentage_jumlah_peneliti_s3_p_personil_litbang`,
        jumlah_peneliti_personil_litbang() AS `total`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `personil_peneliti_tingkat_pendidikan_gender`');
    }
}
