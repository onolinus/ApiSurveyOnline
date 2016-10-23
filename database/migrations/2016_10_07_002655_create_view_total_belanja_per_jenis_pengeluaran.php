<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTotalBelanjaPerJenisPengeluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `total_belanja_per_jenis_pengeluaran` AS
            SELECT SUM(`answers4`.`belanja_pegawai_upah`)/SUM(`answers2`.`jumlah`)*100 AS `percentage_belanja_pegawai_upah`,
            SUM(`answers4`.`belanja_pegawai_upah`) AS `belanja_pegawai_upah`,
            SUM(`answers4`.`belanja_modal_properti`)/SUM(`answers2`.`jumlah`)*100 AS `percentage_belanja_modal_properti`,
            SUM(`answers4`.`belanja_modal_properti`) AS `belanja_modal_properti`,
            SUM(`answers4`.`belanja_modal_mesin`)/SUM(`answers2`.`jumlah`)*100 AS `percentage_belanja_modal_mesin`,
            SUM(`answers4`.`belanja_modal_mesin`) AS `belanja_modal_mesin`,
            SUM(`answers4`.`belanja_operasional_maintenance`)/SUM(`answers2`.`jumlah`)*100 AS `percentage_belanja_operasional_maintenance`,
            SUM(`answers4`.`belanja_operasional_maintenance`) AS `belanja_operasional_maintenance`,
            SUM(`answers2`.`jumlah`) AS `total`
            FROM `answers4`
            JOIN `answers2` ON `answers2`.`id_answer` = `answers4`.`id_answer`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `total_belanja_per_jenis_pengeluaran`');
    }
}
