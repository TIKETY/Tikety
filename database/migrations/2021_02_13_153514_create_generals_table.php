<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('price');
            $table->string('ability1')->nullable();
            $table->string('ability2')->nullable();
            $table->string('ability3')->nullable();
            $table->string('ability4')->nullable();
            $table->string('ability5')->nullable();
            $table->string('ability6')->nullable();
            $table->string('ability7')->nullable();
            $table->string('ability8')->nullable();
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
        Schema::dropIfExists('generals');
    }
}
