<?php

class Mensaje extends Eloquent {

	protected $table = 'mensajes';

	protected $softDelete = true;

	protected $fillable = array('id_usuario', 'texto');

	public function usuario() {
		return $this->belongsTo('Usuario', 'id_usuario', 'id');
	}

}