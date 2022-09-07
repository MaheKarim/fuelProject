<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLPGCylindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_p_g_cylinders', function (Blueprint $table) {
            $table->id();
            $table->string('cylinder_name');
            $table->string('cylinder_size');
            $table->string('cylinder_stock');
            $table->string('cylinder_price');
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
        Schema::dropIfExists('l_p_g_cylinders');
    }
}
