<?php

class Pregunta extends Eloquent {

	protected $table = 'preguntas';
	public $timestamps = false;

	protected $fillable = array('fase', 'id_usuario', 'respuesta');

	public function usuario() {
		return $this->belongsTo('Usuario', 'id_usuario', 'id');
	}

}