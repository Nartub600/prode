<?php

class Partido extends Eloquent {

	public $timestamps = false;

	protected $table = 'partidos';
	protected $dates = array('fecha');

	public function equipoA() {
		return $this->belongsTo('Equipo', 'id_equipo_a', 'id');
	}

	public function equipoB() {
		return $this->belongsTo('Equipo', 'id_equipo_b', 'id');
	}

}