<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('email', 250)->unique();
            $table->boolean('email_confirmado')->default(0);
            $table->string('token', 254)->nullable();
            $table->string('password');
            $table->unsignedInteger('id_rol')->default(1);
            $table->foreign('id_rol')->references('id')->on('roles');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    /*{
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    */

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
