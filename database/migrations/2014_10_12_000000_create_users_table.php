<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $requirePrimaryKey = DB::selectOne('SHOW SESSION VARIABLES LIKE "sql_require_primary_key";')->Value ?? 'OFF';
        if ($requirePrimaryKey === 'ON') {
            DB::statement('SET SESSION sql_require_primary_key=0');
        }
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('phone_number')->unique();
            $table->string('verification_code')->nullable();
            $table->string('phone_verified_at')->nullable();
            $table->string('blocked_at')->nullable();
            $table->string('deleted_at')->nullable();
            $table->string('token')->nullable()->default(null);
            $table->string('password');
            $table->string('image_url')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
