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
          $table->unsignedInteger('comanda_id');
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('item_id');

          $table->primary(['comanda_id', 'user_id', 'item_id']);

          $table->foreign('comanda_id')->references('id')->on('comanda');
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('item_id')->references('id')->on('item');
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
