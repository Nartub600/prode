<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRespuestas extends Migration {

    public function up()
    {
        Schema::create('respuestas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('respuesta');
            $table->string('fase');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('respuestas');
    }

}
