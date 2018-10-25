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
            $table->unsignedInteger('user_id');
            $table->string('nome', 45);
            $table->unsignedInteger('categoria_id');
            $table->decimal('valor', 10, 2);
            $table->timestamps();

            $table->primary(['id', 'user_id']);

            $table->unique(array('user_id', 'nome', 'categoria_id'), 'item-nome_UNIQUE');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categoria');
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
