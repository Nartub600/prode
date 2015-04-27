<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMensajes extends Migration {

    public function up()
    {
        Schema::create('mensajes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->string('texto');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('mensajes');
    }

}
