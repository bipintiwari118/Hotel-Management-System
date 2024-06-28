<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomtypeimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomtypeimages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roomtype_id');
            $table->text('img_src');
            $table->text('img_alt');
            $table->timestamps();
            $table->foreign('roomtype_id')->references('id')->on('roomtype_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomtypeimages');
    }
}
