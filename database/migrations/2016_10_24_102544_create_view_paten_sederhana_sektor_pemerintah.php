<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewPatenSederhanaSektorPemerintah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `paten_sederhana_sektor_pemerintah` AS
        SELECT
        (SELECT SUM(`usulan_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2013\') AS `usulan_patensederhana_2013`,
        (SELECT SUM(`usulan_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2013\')/jumlah_paten_sederhana()*100 AS `percentage_usulan_patensederhana_2013`,
        (SELECT SUM(`disetujui_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2013\') AS `disetujui_patensederhana_2013`,
        (SELECT SUM(`disetujui_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2013\')/jumlah_paten_sederhana()*100 AS `percentage_disetujui_patensederhana_2013`,
        (SELECT SUM(`terkomersialisasi_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2013\') AS `terkomersialisasi_patensederhana_2013`,
        (SELECT SUM(`terkomersialisasi_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2013\')/jumlah_paten_sederhana()*100 AS `percentage_terkomersialisasi_patensederhana_2013`,
        (SELECT SUM(`usulan_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2014\') AS `usulan_patensederhana_2014`,
        (SELECT SUM(`usulan_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2014\')/jumlah_paten_sederhana()*100 AS `percentage_usulan_patensederhana_2014`,
        (SELECT SUM(`disetujui_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2014\') AS `disetujui_patensederhana_2014`,
        (SELECT SUM(`disetujui_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2014\')/jumlah_paten_sederhana()*100 AS `percentage_disetujui_patensederhana_2014`,
        (SELECT SUM(`terkomersialisasi_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2014\') AS `terkomersialisasi_patensederhana_2014`,
        (SELECT SUM(`terkomersialisasi_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2014\')/jumlah_paten_sederhana()*100 AS `percentage_terkomersialisasi_patensederhana_2014`,
        (SELECT SUM(`usulan_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2015\') AS `usulan_patensederhana_2015`,
        (SELECT SUM(`usulan_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2015\')/jumlah_paten_sederhana()*100 AS `percentage_usulan_patensederhana_2015`,
        (SELECT SUM(`disetujui_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2015\') AS `disetujui_patensederhana_2015`,
        (SELECT SUM(`disetujui_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2015\')/jumlah_paten_sederhana()*100 AS `percentage_disetujui_patensederhana_2015`,
        (SELECT SUM(`terkomersialisasi_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2015\') AS `terkomersialisasi_patensederhana_2015`,
        (SELECT SUM(`terkomersialisasi_patensederhana`) FROM `answers16a` WHERE `tahun` = \'2015\')/jumlah_paten_sederhana()*100 AS `percentage_terkomersialisasi_patensederhana_2015`,
        jumlah_paten_sederhana() AS `total`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `paten_sederhana_sektor_pemerintah`');
    }
}
