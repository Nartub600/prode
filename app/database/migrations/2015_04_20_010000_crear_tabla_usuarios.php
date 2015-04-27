<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration {

    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nick');
            $table->string('email');
            $table->string('telefono');
            $table->string('localidad');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('apodo');
            $table->integer('id_candidato');
            $table->string('foto');
            $table->string('password', 60);
            $table->integer('grupo');
            $table->string('remember_token', 100);
            $table->timestamp('last_login');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('usuarios');
    }

}
