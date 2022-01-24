<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('init_price')->nullable();
            $table->string('time')->nullable();
            $table->string('distance')->nullable();
            $table->string('start_loc')->nullable();
            $table->string('end_loc')->nullable();
            $table->longText('details')->nullable();
            $table->string('record')->nullable();
            $table->json('img')->nullable();
            $table->string('start_loc_lat')->nullable();
            $table->string('start_loc_lang')->nullable();
            $table->string('end_loc_lat')->nullable();
            $table->string('end_loc_lang')->nullable();
            $table->enum('status', ['ordered', 'accepted', 'cancel', 'done' ])->default('ordered');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('driver_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
