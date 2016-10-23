<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewJumlahPenelitiPerJabatanFungsionalPersonilLitbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `personil_peneliti_per_jabatan_fungsional` AS
        SELECT
        jumlah_peneliti_fungsional_personil_litbang() AS `jumlah_peneliti_fungsional`,
        jumlah_peneliti_fungsional_personil_litbang()/jumlah_peneliti_personil_litbang()*100 AS `percentage_jumlah_peneliti_fungsional`,
        jumlah_peneliti_nonfungsional_personil_litbang() AS `jumlah_peneliti_nonfungsional`,
        jumlah_peneliti_nonfungsional_personil_litbang()/jumlah_peneliti_personil_litbang()*100 AS `percentage_jumlah_peneliti_nonfungsional`,
        jumlah_peneliti_fungsional_nonpeneliti_personil_litbang() AS `jumlah_peneliti_fungsional_nonpeneliti`,
        jumlah_peneliti_fungsional_nonpeneliti_personil_litbang()/jumlah_peneliti_personil_litbang()*100 AS `percentage_jumlah_peneliti_fungsional_nonpeneliti`,
        jumlah_peneliti_personil_litbang() AS `total`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `personil_peneliti_per_jabatan_fungsional`');
    }
}
