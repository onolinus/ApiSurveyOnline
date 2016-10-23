<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewPatenSektorPemerintah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `paten_sektor_pemerintah` AS
        SELECT
        (SELECT SUM(`usulan_paten`) FROM `answers16a` WHERE `tahun` = \'2013\') AS `usulan_paten_2013`,
        (SELECT SUM(`usulan_paten`) FROM `answers16a` WHERE `tahun` = \'2013\')/jumlah_paten()*100 AS `percentage_usulan_paten_2013`,
        (SELECT SUM(`disetujui_paten`) FROM `answers16a` WHERE `tahun` = \'2013\') AS `disetujui_paten_2013`,
        (SELECT SUM(`disetujui_paten`) FROM `answers16a` WHERE `tahun` = \'2013\')/jumlah_paten()*100 AS `percentage_disetujui_paten_2013`,
        (SELECT SUM(`terkomersialisasi_paten`) FROM `answers16a` WHERE `tahun` = \'2013\') AS `terkomersialisasi_paten_2013`,
        (SELECT SUM(`terkomersialisasi_paten`) FROM `answers16a` WHERE `tahun` = \'2013\')/jumlah_paten()*100 AS `percentage_terkomersialisasi_paten_2013`,
        (SELECT SUM(`usulan_paten`) FROM `answers16a` WHERE `tahun` = \'2014\') AS `usulan_paten_2014`,
        (SELECT SUM(`usulan_paten`) FROM `answers16a` WHERE `tahun` = \'2014\')/jumlah_paten()*100 AS `percentage_usulan_paten_2014`,
        (SELECT SUM(`disetujui_paten`) FROM `answers16a` WHERE `tahun` = \'2014\') AS `disetujui_paten_2014`,
        (SELECT SUM(`disetujui_paten`) FROM `answers16a` WHERE `tahun` = \'2014\')/jumlah_paten()*100 AS `percentage_disetujui_paten_2014`,
        (SELECT SUM(`terkomersialisasi_paten`) FROM `answers16a` WHERE `tahun` = \'2014\') AS `terkomersialisasi_paten_2014`,
        (SELECT SUM(`terkomersialisasi_paten`) FROM `answers16a` WHERE `tahun` = \'2014\')/jumlah_paten()*100 AS `percentage_terkomersialisasi_paten_2014`,
        (SELECT SUM(`usulan_paten`) FROM `answers16a` WHERE `tahun` = \'2015\') AS `usulan_paten_2015`,
        (SELECT SUM(`usulan_paten`) FROM `answers16a` WHERE `tahun` = \'2015\')/jumlah_paten()*100 AS `percentage_usulan_paten_2015`,
        (SELECT SUM(`disetujui_paten`) FROM `answers16a` WHERE `tahun` = \'2015\') AS `disetujui_paten_2015`,
        (SELECT SUM(`disetujui_paten`) FROM `answers16a` WHERE `tahun` = \'2015\')/jumlah_paten()*100 AS `percentage_disetujui_paten_2015`,
        (SELECT SUM(`terkomersialisasi_paten`) FROM `answers16a` WHERE `tahun` = \'2015\') AS `terkomersialisasi_paten_2015`,
        (SELECT SUM(`terkomersialisasi_paten`) FROM `answers16a` WHERE `tahun` = \'2015\')/jumlah_paten()*100 AS `percentage_terkomersialisasi_paten_2015`,
        jumlah_paten() AS `total`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `paten_sektor_pemerintah`');
    }
}
