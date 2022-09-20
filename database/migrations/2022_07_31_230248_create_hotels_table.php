<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->integer('rate');
            $table->string('mobile');
            // $table->date('checkin');
            // $table->date('checkout');
            // $table->integer('number_of_room');
            // $table->integer('number_of_people')->nullable();
            // $table->integer('number_of_children')->nullable();
            $table->text('discreption')->nullable();
            $table->string('image')->nullable();
            $table->foreignId("city_id");
            $table->foreign("city_id")->on('cities')->references('id');
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
        Schema::dropIfExists('hotels');
    }
}
