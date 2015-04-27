<?php

class FechaSeeder extends Seeder {

    public function run()
    {
        Fecha::create([
            'fase'  => 'grupos',
            'desde' => Carbon::create(2015, 4, 1, 0, 0, 0, 'America/Buenos_Aires'),
            'hasta' => Carbon::create(2015, 6, 11, 20, 15, 0, 'America/Buenos_Aires')
        ]);

        Fecha::create([
            'fase'  => 'cuartos',
            'desde' => Carbon::create(2015, 6, 21, 21, 30, 0, 'America/Buenos_Aires'),
            'hasta' => Carbon::create(2015, 6, 24, 20, 15, 0, 'America/Buenos_Aires')
        ]);

        Fecha::create([
            'fase'  => 'semi',
            'desde' => Carbon::create(2015, 6, 27, 23, 30, 0, 'America/Buenos_Aires'),
            'hasta' => Carbon::create(2015, 6, 29, 20, 15, 0, 'America/Buenos_Aires')
        ]);

        Fecha::create([
            'fase'  => 'final',
            'desde' => Carbon::create(2015, 6, 30, 23, 30, 0, 'America/Buenos_Aires'),
            'hasta' => Carbon::create(2015, 7, 3, 20, 15, 0, 'America/Buenos_Aires')
        ]);
    }

}
