<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdicionalComandaItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicional_comanda_item', function (Blueprint $table) {
          $table->unsignedInteger('adicional_id');
          $table->unsignedInteger('comanda_item-comanda_id');
          $table->unsignedInteger('comanda_item-item_id');

          $table->primary(['adicional_id', 'comanda_item-comanda_id', 'comanda_item-item_id'], 'chavePrimaria');

          $table->foreign('adicional_id')->references('id')->on('adicional');
          $table->foreign('comanda_item-comanda_id')->references('comanda_id')->on('comanda_item');
          $table->foreign('comanda_item-item_id')->references('item_id')->on('comanda_item');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adicional_comanda_item');
    }
}
