<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullableFieldsInRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->integer('infants_number')->nullable()->default(null)->change();
            $table->decimal('infants_price', 15,0)->nullable()->default(null)->change();
            $table->integer('childs_shared_number')->nullable()->default(null)->change();
            $table->decimal('childs_shared_price', 15,0)->nullable()->default(null)->change();
            $table->integer('childs_single_number')->nullable()->default(null)->change();
            $table->decimal('childs_single_price', 15,0)->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            //
        });
    }
}
