<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesglocePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desglocePedidos', function (Blueprint $table) {
            $table->increments('iddesgloce');

            $table->integer('idpedido')->unsigned();
            $table->foreign('idpedido')->references('idpedido')->on('pedidos');

            $table->integer('idproducto')->unsigned();
            $table->foreign('idproducto')->references('idproducto')->on('productos');

            $table->integer('cantida_pedida');
            $table->integer('cantida_autorizada');
            $table->date('fecha_autorizo');
            $table->date('fecha_entrega');

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
        Schema::dropIfExists('desglocePedidos');
    }
}
