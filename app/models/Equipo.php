<?php

class Equipo extends Eloquent {

	public $timestamps = false;

	protected $table = 'equipos';

	public function estadisticas() {
		return Helpers::estadisticas($this);
	}

}