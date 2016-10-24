<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionJumlahProdukBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION jumlah_produk_barang() RETURNS double(15,2)
        BEGIN
            DECLARE jumlah_produk_barang double(15,2);
            SET jumlah_produk_barang = (
                    SELECT(
                        COUNT(`id`)
                    ) FROM `answers15a`
                );
            return jumlah_produk_barang;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `jumlah_produk_barang`');
    }
}
