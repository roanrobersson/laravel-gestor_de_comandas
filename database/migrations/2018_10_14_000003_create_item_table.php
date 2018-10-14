<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedInteger('idUsuario');
            $table->integer('nome');
            $table->integer('icone');
            $table->unsignedInteger('idCategoria');
            $table->decimal('valor', 10, 2);
            $table->timestamps();

            $table->primary(['id', 'idUsuario']);

            $table->unique('nome', 'item-nome_UNIQUE');

            $table->foreign('idUsuario')->references('id')->on('users');
        });

        DB::statement('ALTER TABLE item MODIFY id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
