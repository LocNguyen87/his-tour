<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->nullable()->default(null);
            $table->string('title');
            $table->string('title_alias');
            $table->string('times',110);
            $table->date('begin_date');
            $table->integer('to_id');
            $table->integer('from_id');
            $table->string('image');
            $table->integer('category_id', false, true);
            $table->decimal('price', 15, 4)->nullable()->default(null);
            $table->decimal('sale_price', 15, 4)->nullable()->default(null);
            $table->string('itinerary');
            $table->longText('special')->nullable()->default(null);
            $table->longText('detail')->nullable()->default(null);
            $table->longText('schedule')->nullable()->default(null);
            $table->longText('note')->nullable()->default(null);
            $table->longText('params');
            $table->tinyInteger('public', false, true)->default(1);
            $table->tinyInteger('featured', false, true)->default(0);
            $table->integer('ordering', false, true)->default(9999);
            $table->integer('hits', false, true)->default(0);
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
        Schema::dropIfExists('tours');
    }
}
