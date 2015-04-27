<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPreguntas extends Migration {

    public function up()
    {
        Schema::create('preguntas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->string('respuesta');
            $table->string('fase');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('preguntas');
    }

}
