<?php

class FechaController extends BaseController {

	public function listar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/fechas', array(
				'fechas' => Fecha::all()
			))->render()
		));
	}

	public function editar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/editar/fecha', array(
				'fecha' => Fecha::find(Input::get('id_fecha'))
			))->render()
		));
	}

	public function guardar() {
		$data = Input::all();

		$rules = array(
			// 'fase' => 'required',
			'desde' => 'required',
			'hasta' => 'required'
		);

		$messages = array(
			// 'fase.required' => 'La fase es obligatoria',
			'desde.required' => 'Hay que elegir una fecha "desde"',
			'hasta.required' => 'Hay que elegir una fecha "hasta"'
		);

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes()) {
			$fecha = Fecha::find(Input::get('id'));
			$desde = Carbon::createFromFormat('d/m/Y H:i', Input::get('desde') . ' ' . Input::get('hora_desde'));
			$desde->second = 0;
			$fecha->desde = $desde;
			$hasta = Carbon::createFromFormat('d/m/Y H:i', Input::get('hasta') . ' ' . Input::get('hora_hasta'));
			$hasta->second = 0;
			$fecha->hasta = $hasta;
			$fecha->save();

			return Response::json(array(
				'status' => 'ok',
				'mensaje' => 'Las fechas se guardaron correctamente',
				'content' => View::make('back/listar/fechas', array(
					'fechas' => Fecha::all()
				))->render()
			));
		} else {
			return Response::json(array(
				'status' => 'error',
				// 'mensaje' => trim(implode(' ', $validator->messages()->all()))
				'validator' => $validator->messages()->toArray()
			));
		}
	}

}