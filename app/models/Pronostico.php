<?php

class Pronostico extends Eloquent {

	protected $table = 'pronosticos';

	protected $fillable = array('fase', 'id_usuario', 'id_partido', 'goles_a', 'goles_b');

	public function usuario() {
		return $this->belongsTo('Usuario', 'id_usuario', 'id');
	}

	public function partido() {
		return $this->belongsTo('Partido', 'id_partido', 'id');
	}

}