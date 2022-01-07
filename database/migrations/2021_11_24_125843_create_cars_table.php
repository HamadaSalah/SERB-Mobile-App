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
            $table->unsignedBigInteger('driver_id');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('car_no')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('img_front')->nullable();
            $table->string('img_back')->nullable();
            $table->string('img_left')->nullable();
            $table->string('img_right')->nullable();
            $table->string('form')->nullable();
            $table->string('policy')->nullable();
            $table->unsignedBigInteger('driver_company_id')->nullable();
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
