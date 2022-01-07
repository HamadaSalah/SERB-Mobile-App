<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('password')->nullable();
            $table->enum('type', ['company', 'driver', 'company_driver']);
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('photo')->nullable();
            $table->string('fcm_token')->nullable();
            $table->string('NationID')->nullable();
            $table->string('D_licence')->nullable();
            $table->string('com_reg')->nullable(); //السجل الضريبي
            $table->string('lang')->nullable();
            $table->string('lat')->nullable();
            $table->string('address')->nullable();
            $table->string('tax_no')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('company_id')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
