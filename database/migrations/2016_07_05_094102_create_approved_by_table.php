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
            $table->increments('id');
            $table->integer('correspondent_id_approved')->unsigned()->unique();
            $table->string('name', 150);
            $table->string('nip', 100)->unique();
            $table->string('role', 150);
            $table->string('puslit', 150);
            $table->text('alamat');
            $table->string('lembaga', 150);
            $table->timestamps();
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
