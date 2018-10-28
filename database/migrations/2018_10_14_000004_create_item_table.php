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
            $table->increments('id');
            $table->string('nome', 30);
            $table->unsignedInteger('categoria_id');
            $table->decimal('valor', 10, 2);

            $table->unique(array('nome', 'categoria_id'), 'item-nome_UNIQUE');

            $table->foreign('categoria_id')->references('id')->on('categoria');
        });

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
