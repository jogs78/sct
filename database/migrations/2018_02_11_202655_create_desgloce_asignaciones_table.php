<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesgloceAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desgloceAsignaciones', function (Blueprint $table) {
            $table->increments('iddesgloce');

            $table->integer('idasignar')->unsigned();
            $table->foreign('idasignar')->references('idasignar')->on('asignaciones');
            
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
        Schema::dropIfExists('desgloceAsignaciones');
    }
}
