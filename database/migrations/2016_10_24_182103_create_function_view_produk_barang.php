<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionViewProdukBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW `produk_barang` AS
        SELECT
        COUNT(`id`) AS `jumlah`,
        COUNT(`id`)/jumlah_produk_barang()*100 AS `percentage`,
        `tahun`,
        (CASE WHEN (`terkomersialisasi` = 1) THEN \'terkomersialisasi\' ELSE \'belum terkomersialisasi\' END) AS `status`
        FROM `answers15a`
        GROUP BY `tahun`,`terkomersialisasi`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `produk_barang`');
    }
}
