<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewJumlahTeknisiTingkatPendidikanGenderPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `personil_teknisi_tingkat_pendidikan_gender` AS
        SELECT
        jumlah_teknisi_s1_lakilaki_personil_litbang() AS `jumlah_teknisi_s1_l_personil_litbang`,
        jumlah_teknisi_s1_lakilaki_personil_litbang()/jumlah_teknisi_personil_litbang()*100 AS `percentage_jumlah_teknisi_s1_l_personil_litbang`,
        jumlah_teknisi_s1_perempuan_personil_litbang() AS `jumlah_teknisi_s1_p_personil_litbang`,
        jumlah_teknisi_s1_perempuan_personil_litbang()/jumlah_teknisi_personil_litbang()*100 AS `percentage_jumlah_teknisi_s1_p_personil_litbang`,
        jumlah_teknisi_d3_lakilaki_personil_litbang() AS `jumlah_teknisi_d3_l_personil_litbang`,
        jumlah_teknisi_d3_lakilaki_personil_litbang()/jumlah_teknisi_personil_litbang()*100 AS `percentage_jumlah_teknisi_d3_l_personil_litbang`,
        jumlah_teknisi_d3_perempuan_personil_litbang() AS `jumlah_teknisi_d3_p_personil_litbang`,
        jumlah_teknisi_d3_perempuan_personil_litbang()/jumlah_teknisi_personil_litbang()*100 AS `percentage_jumlah_teknisi_d3_p_personil_litbang`,
        jumlah_teknisi_belowd3_lakilaki_personil_litbang() AS `jumlah_teknisi_belowd3_l_personil_litbang`,
        jumlah_teknisi_belowd3_lakilaki_personil_litbang()/jumlah_teknisi_personil_litbang()*100 AS `percentage_jumlah_teknisi_belowd3_l_personil_litbang`,
        jumlah_teknisi_belowd3_perempuan_personil_litbang() AS `jumlah_teknisi_belowd3_p_personil_litbang`,
        jumlah_teknisi_belowd3_perempuan_personil_litbang()/jumlah_teknisi_personil_litbang()*100 AS `percentage_jumlah_teknisi_belowd3_p_personil_litbang`,
        jumlah_teknisi_personil_litbang() AS `total`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `personil_teknisi_tingkat_pendidikan_gender`');
    }
}
