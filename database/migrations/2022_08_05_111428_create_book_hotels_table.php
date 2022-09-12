<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_hotels', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_arrival');
            $table->date('departure_date');
            $table->float('number_of_people');
            $table->float('number_of_room');
            $table->foreignId("hotel_id");
            $table->foreign("hotel_id")->on('hotels')->references('id');
            $table->foreignId("user_id");
            $table->foreign("user_id")->on('users')->references('id');
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
        Schema::dropIfExists('book_hotels');
    }
}
