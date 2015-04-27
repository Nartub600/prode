<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsuarioSeeder');
		$this->call('EquipoSeeder');
		$this->call('PartidoSeeder');
		$this->call('FechaSeeder');
		$this->call('RespuestaSeeder');
	}

}