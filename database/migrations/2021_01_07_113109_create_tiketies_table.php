<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiketies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('bus_id');
            $table->string('from');
            $table->string('seat');
            $table->string('to');
            $table->string('date');
            $table->string('time');
            $table->string('amount');
            $table->string('code');
            $table->string('token');
            $table->string('used_state')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiketies');
    }
}
