<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type_car');
            $table->string('model')->nullable();
            $table->enum('vehicle_class',['ممتاز','متميز','عادي'])->nullable();
            $table->string('image')->nullable();
            $table->string('car_color');
            $table->string('car_number');
            $table->foreignId("compane_id");
            $table->foreign("compane_id")->on('companes')->references('id');

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
        Schema::dropIfExists('cars');
    }
}
