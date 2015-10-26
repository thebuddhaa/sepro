<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_no')->unique();
            $table->string('location');
            $table->string('room_type');
            $table->string('capacity');
            $table->string('facility');
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
        Schema::drop('room_info');
    }
}
