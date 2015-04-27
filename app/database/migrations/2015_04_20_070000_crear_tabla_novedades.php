<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaNovedades extends Migration {

    public function up()
    {
        Schema::create('novedades', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('titulo');
            $table->string('texto');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('novedades');
    }

}
