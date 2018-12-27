<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefactorTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            // $table->dropColumn('votes');
            $table->longText('params')->nullable()->default(null)->change();
        }
        Schema::table('categories', function (Blueprint $table) {
            // $table->dropColumn('votes');
            $table->longText('params')->nullable()->default(null)->change();
            $table->text('summary')->nullable()->default(null)->change();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
