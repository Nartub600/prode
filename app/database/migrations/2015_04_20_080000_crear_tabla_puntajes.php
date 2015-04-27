<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPuntajes extends Migration {

    public function up()
    {
        Schema::create('puntajes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->integer('grupos');
            $table->integer('cuartos');
            $table->integer('semi');
            $table->integer('final');
            $table->integer('puntos_candidato');
            $table->boolean('act_candidato')->default(false);
            $table->integer('total');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('puntajes');
    }

}
