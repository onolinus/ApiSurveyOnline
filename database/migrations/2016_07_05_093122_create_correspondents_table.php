<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrespondentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correspondents', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('name', 150);
            $table->string('nip', 100)->unique();
            $table->string('role', 150);
            $table->string('telephone_number', 20);
            $table->string('handhone_number', 20);
            $table->timestamps();
            $table->primary('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('correspondents');
    }
}
