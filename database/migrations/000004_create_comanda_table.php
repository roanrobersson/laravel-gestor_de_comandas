<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComandaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comanda', function (Blueprint $table) {
          $table->unsignedInteger('id');
          $table->unsignedInteger('idUsuario');
          $table->integer('nomeCliente');
          $table->boolean('paga');
          $table->decimal('desconto', 10, 2);
          $table->timestamps();

          $table->primary(['id', 'idUsuario']);

          $table->foreign('idUsuario')->references('id')->on('users');
        });

        DB::statement('ALTER TABLE comanda MODIFY id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comanda');
    }
}
