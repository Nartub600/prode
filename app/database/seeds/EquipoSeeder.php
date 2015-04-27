<?php

class EquipoSeeder extends Seeder {

    public function run()
    {

        Equipo::create(['nombre' => 'Chile',     'grupo' => 'A']);
        Equipo::create(['nombre' => 'México',    'grupo' => 'A']);
        Equipo::create(['nombre' => 'Ecuador',   'grupo' => 'A']);
        Equipo::create(['nombre' => 'Bolivia',   'grupo' => 'A']);

        Equipo::create(['nombre' => 'Argentina', 'grupo' => 'B']);
        Equipo::create(['nombre' => 'Uruguay',   'grupo' => 'B']);
        Equipo::create(['nombre' => 'Paraguay',  'grupo' => 'B']);
        Equipo::create(['nombre' => 'Jamaica',   'grupo' => 'B']);

        Equipo::create(['nombre' => 'Brasil',    'grupo' => 'C']);
        Equipo::create(['nombre' => 'Colombia',  'grupo' => 'C']);
        Equipo::create(['nombre' => 'Perú',      'grupo' => 'C']);
        Equipo::create(['nombre' => 'Venezuela', 'grupo' => 'C']);

        Equipo::create(['nombre' => '1ro A']);
        Equipo::create(['nombre' => '1ro B']);
        Equipo::create(['nombre' => '1ro C']);
        Equipo::create(['nombre' => '2do A']);
        Equipo::create(['nombre' => '2do B']);
        Equipo::create(['nombre' => '2do C']);
        Equipo::create(['nombre' => '1er 3ro']);
        Equipo::create(['nombre' => '2do 3ro']);

        Equipo::create(['nombre' => 'Ganador 19']);
        Equipo::create(['nombre' => 'Ganador 20']);
        Equipo::create(['nombre' => 'Ganador 21']);
        Equipo::create(['nombre' => 'Ganador 22']);
        Equipo::create(['nombre' => 'Ganador 23']);
        Equipo::create(['nombre' => 'Ganador 24']);
        Equipo::create(['nombre' => 'Perdedor 23']);
        Equipo::create(['nombre' => 'Perdedor 24']);

    }

}
