<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedByTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_by', function (Blueprint $table) {
            $table->integer('correspondent_id_approved')->unsigned()->primary('correspondent_id_approved');
            $table->string('name', 150);
            $table->string('nip', 100)->unique();
            $table->string('role', 150);
            $table->string('puslit', 150);
            $table->text('alamat');
            $table->integer('id_lembaga')->unsigned();
            $table->timestamps();
            $table->index(['id_lembaga']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('approved_by');
    }
}
