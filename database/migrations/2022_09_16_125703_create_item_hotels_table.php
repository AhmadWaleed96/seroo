<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->date('checkin');
            $table->date('checkout');
            $table->integer('number_of_room');
            $table->integer('number_of_people');
            $table->integer('number_of_children');
            $table->foreignId("city_id");
            $table->foreign("city_id")->on('cities')->references('id');
            $table->foreignId("hotel_id");
            $table->foreign("hotel_id")->on('hotels')->references('id');
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
        Schema::dropIfExists('item_hotels');
    }
}
