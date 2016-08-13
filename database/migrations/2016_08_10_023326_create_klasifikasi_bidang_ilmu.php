<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlasifikasiBidangIlmu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klasifikasi_bidang_ilmu', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('code', 5)->unique();
            $table->string('bidang_ilmu', 150);
            $table->string('kelompok', 150);
            $table->primary('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('klasifikasi_bidang_ilmu');
    }
}
