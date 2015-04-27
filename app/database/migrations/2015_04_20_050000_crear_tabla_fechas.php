<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFechas extends Migration {

    public function up()
    {
        Schema::create('fechas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('fase');
            $table->timestamp('desde');
            $table->timestamp('hasta');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('fechas');
    }

}
