<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partidas', function (Blueprint $table) {
            $table->dropForeign('partidas_idcap_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partidas', function (Blueprint $table) {
            $table->integer('idcap')->unsigned();
            $table->foreign('idcap')->references('idcap')->on('capitulos');
        });
    }
}
