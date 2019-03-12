<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->increments('idasignar');

            $table->integer('idcap')->unsigned();
            $table->foreign('idcap')->references('idcap')->on('capitulos');

            $table->float('monto', 5,2);
            $table->datetime('mes');

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
        Schema::dropIfExists('asignaciones');
    }
}
