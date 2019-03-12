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
            $table->increments('iduser');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->enum('puesto', ['admin','deleg','delegob'])->default('delegob');
            $table->enum('ubicacion', ['tuxtla', 'bochil','sc','orizaba','trinitaria','tapachula','arriaga'])->default('tuxtla');

            $table->integer('idresidencia')->unsigned();
            $table->foreign('idresidencia')->references('idresidencia')->on('residencias');

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
