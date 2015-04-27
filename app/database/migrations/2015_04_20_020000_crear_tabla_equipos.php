<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEquipos extends Migration {

    public function up()
    {
        Schema::create('equipos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre');
            $table->string('grupo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('equipos');
    }

}
