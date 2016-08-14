<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswers7Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers7', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_answer')->unsigned();
            $table->enum('status', ['pengisian', 'diterima', 'ditolak'])->default('pengisian');
            $table->text('status_comment');
            $table->double('penelitian_dasar', 15, 2);
            $table->double('penelitian_terapan', 15, 2);
            $table->double('pengembangan_eksperimental', 15, 2);
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
        Schema::drop('answers7');
    }
}
