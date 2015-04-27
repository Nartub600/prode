<?php

class Respuesta extends Eloquent {

	protected $table = 'respuestas';
	public $timestamps = false;

	protected $fillable = array('fase', 'respuesta');

}