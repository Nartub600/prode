<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPartidos extends Migration {

    public function up()
    {
        Schema::create('partidos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_equipo_a');
            $table->integer('id_equipo_b');
            $table->integer('goles_a')->nullable();
            $table->integer('goles_b')->nullable();
            $table->timestamp('fecha');
            $table->string('grupo');
            $table->string('fase');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('partidos');
    }

}
