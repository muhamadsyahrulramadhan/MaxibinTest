<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id_item');
            $table->string('name_item', 100);
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id_box');
            $table->unsignedBigInteger('id_location');
            $table->unsignedBigInteger('id_project');
            // $table->foreign('id')->references('id')->on('users');
            // $table->foreign('id_box')->references('id_box')->on('boxes');
            // $table->foreign('id_location')->references('id_location')->on('locations');
            // $table->foreign('id_project')->references('id_project')->on('projects');
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
        Schema::dropIfExists('items');
    }
}
