<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->increments('id_box');
            $table->string('name_box', 100);
            $table->unsignedBigInteger('id_shelf');
            $table->unsignedBigInteger('id_location');
            // $table->foreign('id_shelf')->references('id_shelf')->on('shelves');
            // $table->foreign('id_location')->references('id_location')->on('locations');
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
        Schema::dropIfExists('boxes');
    }
}
