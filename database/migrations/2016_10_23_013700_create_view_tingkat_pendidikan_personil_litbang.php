<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTingkatPendidikanPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `tingkat_pendidikan_personil_litbang` AS
        SELECT
        jumlah_s1_peneliti_personil_litbang() AS `jumlah_s1_peneliti_personil_litbang`,
        jumlah_s1_peneliti_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_s1_peneliti_personil_litbang`,
        jumlah_s1_teknisi_personil_litbang() AS `jumlah_s1_teknisi_personil_litbang`,
        jumlah_s1_teknisi_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_s1_teknisi_personil_litbang`,
        jumlah_s1_staffpendukung_personil_litbang() AS `jumlah_s1_staffpendukung_personil_litbang`,
        jumlah_s1_staffpendukung_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_s1_staffpendukung_personil_litbang`,
        jumlah_s2_peneliti_personil_litbang() AS `jumlah_s2_peneliti_personil_litbang`,
        jumlah_s2_peneliti_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_s2_peneliti_personil_litbang`,
        jumlah_s3_peneliti_personil_litbang() AS `jumlah_s3_peneliti_personil_litbang`,
        jumlah_s3_peneliti_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_s3_peneliti_personil_litbang`,
        jumlah_d3_teknisi_personil_litbang() AS `jumlah_d3_teknisi_personil_litbang`,
        jumlah_d3_teknisi_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_d3_teknisi_personil_litbang`,
        jumlah_d3_staffpendukung_personil_litbang() AS `jumlah_d3_staffpendukung_personil_litbang`,
        jumlah_d3_staffpendukung_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_d3_staffpendukung_personil_litbang`,
        jumlah_belowd3_teknisi_personil_litbang() AS `jumlah_belowd3_teknisi_personil_litbang`,
        jumlah_belowd3_teknisi_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_belowd3_teknisi_personil_litbang`,
        jumlah_belowd3_staffpendukung_personil_litbang() AS `jumlah_belowd3_staffpendukung_personil_litbang`,
        jumlah_belowd3_staffpendukung_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_belowd3_staffpendukung_personil_litbang`,
        jumlah_personil_litbang() AS `total`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `tingkat_pendidikan_personil_litbang`');
    }
}
