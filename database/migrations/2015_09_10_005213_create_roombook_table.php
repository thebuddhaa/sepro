<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoombookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roombook', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_no');
            $table->string('user');
            $table->foreign('user')->references('username')->on('users');
            $table->integer('duration')->nullable();
            $table->string('purpose');
            $table->string('status');
            $table->dateTime('starttime');
            $table->dateTime('endtime');
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
        Schema::drop('roombook');
    }
}
