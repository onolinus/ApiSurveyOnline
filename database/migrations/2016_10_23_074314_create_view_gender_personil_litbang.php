<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewGenderPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `gender_personil_litbang` AS
        SELECT
        jumlah_peneliti_lakilaki_personil_litbang() AS `jumlah_peneliti_lakilaki_personil_litbang`,
        jumlah_peneliti_lakilaki_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_peneliti_lakilaki_personil_litbang`,
        jumlah_peneliti_perempuan_personil_litbang() AS `jumlah_peneliti_perempuan_personil_litbang`,
        jumlah_peneliti_perempuan_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_peneliti_perempuan_personil_litbang`,
        jumlah_teknisi_lakilaki_personil_litbang() AS `jumlah_teknisi_lakilaki_personil_litbang`,
        jumlah_teknisi_lakilaki_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_teknisi_lakilaki_personil_litbang`,
        jumlah_teknisi_perempuan_personil_litbang() AS `jumlah_teknisi_perempuan_personil_litbang`,
        jumlah_teknisi_perempuan_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_teknisi_perempuan_personil_litbang`,
        jumlah_staffpendukung_lakilaki_personil_litbang() AS `jumlah_staffpendukung_lakilaki_personil_litbang`,
        jumlah_staffpendukung_lakilaki_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_staffpendukung_lakilaki_personil_litbang`,
        jumlah_staffpendukung_perempuan_personil_litbang() AS `jumlah_staffpendukung_perempuan_personil_litbang`,
        jumlah_staffpendukung_perempuan_personil_litbang()/jumlah_personil_litbang()*100 AS `percentage_jumlah_staffpendukung_perempuan_personil_litbang`,
        jumlah_personil_litbang() AS `total`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `gender_personil_litbang`');
    }
}
