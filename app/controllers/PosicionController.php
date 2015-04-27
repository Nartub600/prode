<?php

class PosicionController extends BaseController {

	public function listar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/posiciones', array(
				'posiciones' => Posicion::all()
			))->render()
		));
	}

	public function guardar() {
		$posicion = Posicion::where('id', '=', Input::get('id_posicion'))->first();
		$posicion->id_usuario = Input::get('id_usuario');
		$posicion->save();

		return $this->listar();
	}

	public function eliminar() {
		$posicion = Posicion::where('id', '=', Input::get('id_posicion'))->first();
		$posicion->id_usuario = null;
		$posicion->save();

		return $this->listar();
	}

}