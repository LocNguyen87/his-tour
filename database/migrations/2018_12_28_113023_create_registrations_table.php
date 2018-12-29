<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registration_code', 30);
            $table->string('full_name', 100);
            $table->string('address', 20);
            $table->string('phone_number', 20);
            $table->string('email', 30);
            $table->tinyInteger('adults');
            $table->tinyInteger('childs');
            $table->tinyInteger('infant_shared');
            $table->tinyInteger('infant_single');
            $table->integer('tour_id', false, true);
            $table->string('status');
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
        Schema::dropIfExists('registrations');
    }
}
