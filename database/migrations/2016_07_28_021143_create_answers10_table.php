<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers10Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers10', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['terkirim', 'diterima', 'ditolak'])->default('terkirim');
            $table->text('status_comment');
            $table->integer('jumlah_peneliti_pemerintah')->unsigned();
            $table->integer('jumlah_peneliti_perguruantinggi')->unsigned();
            $table->integer('jumlah_peneliti_industri')->unsigned();
            $table->integer('jumlah_peneliti_lembagaswadaya')->unsigned();
            $table->integer('jumlah_peneliti_asing')->unsigned();
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
        Schema::drop('answers10');
    }
}
