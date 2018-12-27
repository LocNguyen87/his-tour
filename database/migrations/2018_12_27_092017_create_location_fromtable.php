<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationFromtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations_from', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',110);
            $table->string('title');
            $table->string('summary',200);
            $table->nullableTimestamps();
        });

        Schema::create('locations_to', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',110);
            $table->string('title');
            $table->string('summary',200);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations_from');
        Schema::dropIfExists('locations_to');
    }
}
