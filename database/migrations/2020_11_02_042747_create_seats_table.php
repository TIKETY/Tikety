<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name')->unique();
            $table->string('platenumber')->unique();
            $table->integer('rows');
            $table->integer('amount');
            $table->string('phonenumber');
            $table->string('address');
            $table->string('image_url')->nullable();
            $table->string('workinghours');
            $table->string('from');
            $table->string('to');
            $table->date('date');
            $table->time('time');
            $table->timestamp('timings');
            $table->string('route');
            $table->string('body');
            $table->timestamp('blocked_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id');
            $table->foreignId('user_id')->nullable();
            $table->string('seat');
            $table->timestamps();

            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('bus_user', function (Blueprint $table) {
            $table->primary(['bus_id', 'user_id']);
            $table->foreignId('bus_id');
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
