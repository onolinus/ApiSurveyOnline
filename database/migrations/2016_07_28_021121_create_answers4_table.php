<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers4', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['pengisian', 'diterima', 'ditolak'])->default('pengisian');
            $table->text('status_comment');
            $table->double('belanja_pegawai_upah', 15, 2);
            $table->double('belanja_modal_properti', 15, 2);
            $table->double('belanja_modal_mesin', 15, 2);
            $table->double('belanja_operasional_maintenance', 15, 2);
            $table->timestamps();
            $table->index(['id_answer']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers4');
    }
}
