<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPronosticos extends Migration {

    public function up()
    {
        Schema::create('pronosticos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->integer('id_partido');
            $table->integer('goles_a');
            $table->integer('goles_b');
            $table->string('fase');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('pronosticos');
    }

}
