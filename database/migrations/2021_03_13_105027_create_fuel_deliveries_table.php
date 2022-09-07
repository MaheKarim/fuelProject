<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('fuel_name_id');
            $table->integer('refueling_for_id');
            $table->dateTime('booking_date');
            $table->integer('phn_number')->nullable();
            $table->string('delivery_address');
            $table->string('quantity');
            $table->string('priority_name_id')->nullable();
            $table->boolean('isApproved')->default('0')->comment('1 for Approve');
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
        Schema::dropIfExists('fuel_deliveries');
    }
}
