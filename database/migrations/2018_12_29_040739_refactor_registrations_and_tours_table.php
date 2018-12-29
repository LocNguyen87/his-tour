<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefactorRegistrationsAndToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('registrations', function (Blueprint $table) {
          $table->dropColumn(['infants', 'childs_shared', 'childs_single']);
          $table->tinyInteger('adults_number');
          $table->decimal('adults_price', 15,0);
          $table->tinyInteger('infants_number');
          $table->decimal('infants_price', 15,0);
          $table->tinyInteger('childs_shared_number');
          $table->decimal('childs_shared_price', 15,0);
          $table->tinyInteger('childs_single_number');
          $table->decimal('childs_single_price', 15,0);
          $table->decimal('total_price', 15,0);
          $table->string('payment_method');
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
