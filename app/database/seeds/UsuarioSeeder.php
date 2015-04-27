<?php

class UsuarioSeeder extends Seeder {

    public function run()
    {
        Usuario::create([
            'nick'     => 'admin',
            'password' => Hash::make('admin'),
            'grupo'    => 1
        ]);
    }

}
