<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedInteger('idUsuario');
            $table->string('nome');
            $table->string('icone');
            $table->timestamps();

            $table->primary(['id', 'idUsuario']);

            $table->unique('nome', 'categoria-nome_UNIQUE');

            $table->foreign('idUsuario')->references('id')->on('users');
        });

        DB::statement('ALTER TABLE categoria MODIFY id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');
    }
}
