<?php

class Novedad extends Eloquent {

	protected $table = 'novedades';

	protected $softDelete = true;

	protected $fillable = array('titulo', 'texto');

}