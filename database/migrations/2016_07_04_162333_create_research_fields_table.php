<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_fields', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('code', 6)->unique();
            $table->string('subject', 100);
            $table->string('area', 100);
            $table->string('sub_area', 100);
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
        Schema::drop('research_fields');
    }
}
