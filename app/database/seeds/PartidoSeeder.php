<?php

class PartidoSeeder extends Seeder {

    // ID  Nombre      Grupo
    // 1   Chile       A
    // 2   México      A
    // 3   Ecuador     A
    // 4   Bolivia     A
    // 5   Argentina   B
    // 6   Uruguay     B
    // 7   Paraguay    B
    // 8   Jamaica     B
    // 9   Brasil      C
    // 10  Colombia    C
    // 11  Perú        C
    // 12  Venezuela   C
    // 13  1ro         A
    // 14  1ro         B
    // 15  1ro         C
    // 16  2do         A
    // 17  2do         B
    // 18  2do         C
    // 19  1er 3ro
    // 20  2do 3ro
    // 21  Ganador 19
    // 22  Ganador 20
    // 23  Ganador 21
    // 24  Ganador 22
    // 25  Ganador 23
    // 26  Ganador 24
    // 27  Perdedor 23
    // 28  Perdedor 24

    public function run()
    {
        Partido::create(['id_equipo_a' => 1, 'id_equipo_b' => 3, 'fecha' => Carbon::create(2015, 6, 11, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'A', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 2, 'id_equipo_b' => 4, 'fecha' => Carbon::create(2015, 6, 12, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'A', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 3, 'id_equipo_b' => 4, 'fecha' => Carbon::create(2015, 6, 15, 18, 00, 0, 'America/Buenos_Aires'), 'grupo' => 'A', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 1, 'id_equipo_b' => 2, 'fecha' => Carbon::create(2015, 6, 15, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'A', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 2, 'id_equipo_b' => 3, 'fecha' => Carbon::create(2015, 6, 19, 18, 00, 0, 'America/Buenos_Aires'), 'grupo' => 'A', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 1, 'id_equipo_b' => 4, 'fecha' => Carbon::create(2015, 6, 19, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'A', 'fase' => 'grupos']);

        Partido::create(['id_equipo_a' => 6, 'id_equipo_b' => 8, 'fecha' => Carbon::create(2015, 6, 13, 16, 00, 0, 'America/Buenos_Aires'), 'grupo' => 'B', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 5, 'id_equipo_b' => 7, 'fecha' => Carbon::create(2015, 6, 13, 18, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'B', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 7, 'id_equipo_b' => 8, 'fecha' => Carbon::create(2015, 6, 16, 18, 00, 0, 'America/Buenos_Aires'), 'grupo' => 'B', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 5, 'id_equipo_b' => 6, 'fecha' => Carbon::create(2015, 6, 16, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'B', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 6, 'id_equipo_b' => 7, 'fecha' => Carbon::create(2015, 6, 20, 16, 00, 0, 'America/Buenos_Aires'), 'grupo' => 'B', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 5, 'id_equipo_b' => 8, 'fecha' => Carbon::create(2015, 6, 20, 18, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'B', 'fase' => 'grupos']);

        Partido::create(['id_equipo_a' => 10, 'id_equipo_b' => 12, 'fecha' => Carbon::create(2015, 6, 14, 16, 00, 0, 'America/Buenos_Aires'), 'grupo' => 'C', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 9,  'id_equipo_b' => 11, 'fecha' => Carbon::create(2015, 6, 14, 18, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'C', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 9,  'id_equipo_b' => 10, 'fecha' => Carbon::create(2015, 6, 17, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'C', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 11, 'id_equipo_b' => 12, 'fecha' => Carbon::create(2015, 6, 18, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'C', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 10, 'id_equipo_b' => 11, 'fecha' => Carbon::create(2015, 6, 21, 16, 00, 0, 'America/Buenos_Aires'), 'grupo' => 'C', 'fase' => 'grupos']);
        Partido::create(['id_equipo_a' => 9,  'id_equipo_b' => 12, 'fecha' => Carbon::create(2015, 6, 21, 18, 30, 0, 'America/Buenos_Aires'), 'grupo' => 'C', 'fase' => 'grupos']);

        // 19
        Partido::create(['id_equipo_a' => 13,  'id_equipo_b' => 19, 'fecha' => Carbon::create(2015, 6, 24, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => '', 'fase' => 'cuartos']);
        // 20
        Partido::create(['id_equipo_a' => 16,  'id_equipo_b' => 18, 'fecha' => Carbon::create(2015, 6, 25, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => '', 'fase' => 'cuartos']);
        // 21
        Partido::create(['id_equipo_a' => 14,  'id_equipo_b' => 20, 'fecha' => Carbon::create(2015, 6, 26, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => '', 'fase' => 'cuartos']);
        // 22
        Partido::create(['id_equipo_a' => 15,  'id_equipo_b' => 17, 'fecha' => Carbon::create(2015, 6, 27, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => '', 'fase' => 'cuartos']);

        // 23
        Partido::create(['id_equipo_a' => 21,  'id_equipo_b' => 22, 'fecha' => Carbon::create(2015, 6, 29, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => '', 'fase' => 'semi']);
        // 24
        Partido::create(['id_equipo_a' => 23,  'id_equipo_b' => 24, 'fecha' => Carbon::create(2015, 6, 30, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => '', 'fase' => 'semi']);

        // 25
        Partido::create(['id_equipo_a' => 27,  'id_equipo_b' => 28, 'fecha' => Carbon::create(2015, 7, 3, 20, 30, 0, 'America/Buenos_Aires'), 'grupo' => '', 'fase' => 'final']);
        // 26
        Partido::create(['id_equipo_a' => 25,  'id_equipo_b' => 26, 'fecha' => Carbon::create(2015, 7, 4, 17, 0, 0, 'America/Buenos_Aires'), 'grupo' => '', 'fase' => 'final']);
    }

}
