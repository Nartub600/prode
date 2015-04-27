<?php

class Fecha extends Eloquent {

	public $timestamps = false;

	protected $table = 'fechas';

	protected $dates = array('desde', 'hasta');

}