<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_cars', function (Blueprint $table) {
            $table->id();
            $table->string('select_the_way');
            $table->string('date');
            $table->float('number_of_vehicles');
            $table->float('number_of_passengers');
            $table->string('form')->nullable();
            $table->foreignId("car_id");
            $table->foreign("car_id")->on('cars')->references('id');
            $table->foreignId("user_id");
            $table->foreign("user_id")->on('users')->references('id');
            $table->foreignId("way_id");
            $table->foreign("way_id")->on('ways')->references('id');


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
        Schema::dropIfExists('book_cars');
    }
}
