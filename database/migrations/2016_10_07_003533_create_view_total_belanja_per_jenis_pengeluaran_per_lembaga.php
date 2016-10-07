<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTotalBelanjaPerJenisPengeluaranPerLembaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `total_belanja_per_jenis_pengeluaran_per_lembaga` AS
            SELECT `lembaga`.*,
            SUM(`answers4`.`belanja_pegawai_upah`)/SUM(`answers2`.`jumlah`)*100 AS `percentage_belanja_pegawai_upah`,
            SUM(`answers4`.`belanja_pegawai_upah`) AS `belanja_pegawai_upah`,
            SUM(`answers4`.`belanja_modal_properti`)/SUM(`answers2`.`jumlah`)*100 AS `percentage_belanja_modal_properti`,
            SUM(`answers4`.`belanja_modal_properti`) AS `belanja_modal_properti`,
            SUM(`answers4`.`belanja_modal_mesin`)/SUM(`answers2`.`jumlah`)*100 AS `percentage_belanja_modal_mesin`,
            SUM(`answers4`.`belanja_modal_mesin`) AS `belanja_modal_mesin`,
            SUM(`answers4`.`belanja_operasional_maintenance`)/SUM(`answers2`.`jumlah`)*100 AS `percentage_belanja_operasional_maintenance`,
            SUM(`answers4`.`belanja_operasional_maintenance`) AS `belanja_operasional_maintenance`,
            SUM(`answers2`.`jumlah`)/jumlahbelanja()*100 AS `percentage_total_per_lembaga`,
            SUM(`answers2`.`jumlah`) AS `total_per_lembaga`
            FROM `lembaga`
            LEFT JOIN `approved_by` ON `approved_by`.`id_lembaga` = `lembaga`.`id`
            LEFT JOIN `answers` ON `answers`.`id_correspondent` = `approved_by`.`correspondent_id_approved`
            LEFT JOIN `answers4` ON `answers4`.`id_answer` = `answers`.`id`
            LEFT JOIN `answers2` ON `answers2`.`id_answer` = `answers`.`id`
            GROUP BY `lembaga`.`id`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `total_belanja_per_jenis_pengeluaran_per_lembaga`');
    }
}
