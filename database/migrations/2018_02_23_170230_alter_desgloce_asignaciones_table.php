<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDesgloceAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desgloceAsignaciones', function (Blueprint $table) {
            $table->dropForeign('desgloceAsignaciones_idpartida_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desgloceAsignaciones', function (Blueprint $table) {
            $table->integer('idpartida')->unsigned();
            $table->foreign('idpartida')->references('idpartida')->on('partidas');
        });
    }
}
