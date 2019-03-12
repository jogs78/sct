<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('idproducto');

            $table->integer('idpartida')->unsigned();
            $table->foreign('idpartida')->references('idpartida')->on('partidas');

            $table->string('descripcion');
            $table->string('unidad_medida');
            $table->float('precio', 5,2);
            $table->string('devolver');
            $table->integer('cantidad');

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
        Schema::dropIfExists('productos');
    }
}
