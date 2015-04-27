<?php

class RespuestaSeeder extends Seeder {

    public function run()
    {
        Respuesta::create(['fase' => 'grupos', 'respuesta' => '']);
        Respuesta::create(['fase' => 'cuartos', 'respuesta' => '']);
        Respuesta::create(['fase' => 'semi', 'respuesta' => '']);
        Respuesta::create(['fase' => 'final', 'respuesta' => '']);
    }

}
