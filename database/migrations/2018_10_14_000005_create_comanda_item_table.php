<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComandaItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comanda_item', function (Blueprint $table) {
          $table->unsignedInteger('idComanda');
          $table->unsignedInteger('idUsuario');
          $table->unsignedInteger('idItem');

          $table->primary(['idComanda', 'idUsuario', 'idItem']);

          $table->foreign('idComanda')->references('id')->on('comanda');
          $table->foreign('idUsuario')->references('id')->on('users');
          $table->foreign('idItem')->references('id')->on('item');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comanda_item');
    }
}
