<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioEconomicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_economics', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('code', 5)->unique();
            $table->string('division', 100);
            $table->integer('division_number')->unsigned();
            $table->string('category', 100);
            $table->string('group', 100);
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
        Schema::drop('socio_economics');
    }
}
