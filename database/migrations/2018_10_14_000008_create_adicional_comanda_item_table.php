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
          $table->increments('id');
          $table->unsignedInteger('adicional_id');
          $table->unsignedInteger('comanda_item_id');

          $table->foreign('adicional_id')->references('id')->on('adicional');
          $table->foreign('comanda_item_id')->references('id')->on('comanda_item');
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
