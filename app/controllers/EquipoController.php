<?php

class EquipoController extends BaseController {

	public function listar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/equipos', array(
				'equipos' => Equipo::all()
			))->render()
		));
	}

	public function agregar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/agregar/equipo')->render()
		));
	}

	public function guardar() {
		$data = Input::all();

		$rules = array(
			'nombre' => 'required'
			// 'grupo' => 'required'
		);

		$messages = array(
			'nombre.required' => 'El equipo debe llamarse de alguna manera'
			// 'grupo.required' => 'El equipo debe pertenecer a un grupo'
		);

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes()) {
			$equipo = new Equipo;
			$equipo->nombre = Input::get('nombre');
			$equipo->grupo = Input::get('grupo');
			$equipo->save();

			return Response::json(array(
				'status' => 'ok',
				'mensaje' => 'El equipo se guardó correctamente',
				'html' => View::make('back/listar/equipos', array(
					'equipos' => Equipo::all()
				))->render()
			));
		} else {
			return Response::json(array(
				'status' => 'error',
				// 'mensaje' => trim(implode(' ', $validator->messages()->all())),
				'validator' => $validator->messages()->toArray()
			));
		}
	}

}