<?php

class PartidoController extends BaseController {

	public function listar() {
		$partidos = Partido::orderBy('fecha')->orderBy('grupo')->get();

		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/partidos', array(
				'partidos' => $partidos
			))->render()
		));
	}

	public function agregar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/agregar/partido', array(
				'equipos' => Equipo::all()
			))->render()
		));
	}

	public function editar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/editar/partido', array(
				'equipos' => Equipo::all(),
				'partido' => Partido::find(Input::get('id_partido'))
			))->render()
		));
	}

	public function guardar() {
		$data = Input::all();

		$rules = array(
			'id_equipo_a' => 'required_without:id',
			'id_equipo_b' => 'required_without:id',
			// 'goles_a' => 'required_with:id',
			// 'goles_b' => 'required_with:id',
			'fase' => 'required_without:id'
		);

		$messages = array(
			'id_equipo_a.required_without' => 'El equipo A debe jugar',
			'id_equipo_b.required_without' => 'El equipo B debe jugar',
			// 'goles_a.required_with' => 'Faltan los goles del equipo A',
			// 'goles_b.required_with' => 'Faltan los goles del equipo B',
			'fase.required_without' => 'Falta elegir la fase'
		);

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes()) {
			$partido = Input::get('id') ? Partido::find(Input::get('id')) : new Partido;
			$partido->id_equipo_a = Input::get('id_equipo_a') ? Input::get('id_equipo_a') : $partido->id_equipo_a;
			$partido->id_equipo_b = Input::get('id_equipo_b') ? Input::get('id_equipo_b') : $partido->id_equipo_b;
			if(Input::has('goles_a')) { $partido->goles_a = (int) Input::get('goles_a'); } else { $partido->goles_a = null; }
			if(Input::has('goles_b')) { $partido->goles_b = (int) Input::get('goles_b'); } else { $partido->goles_b = null; }
			$partido->fase = Input::get('fase');
			$partido->save();

			// $participantes = Usuario::where('grupo', '=', '2')
			// 	->where('email', '!=', '')
			// 	->get();

			// foreach($participantes as $participante) {
			// 	$puntos = 0;
			// 	$pronosticos = Pronostico::where('id_usuario', '=', $participante->id)->get();
			// 	if(count($pronosticos) != 0) {
			// 		foreach($pronosticos as $pronostico) {
			// 			$puntos = $puntos + Helpers::calcular_puntos($pronostico);
			// 		}
			// 	}
			// 	$participante->puntos = $puntos;
			// 	$participante->save();
			// }

			return Response::json(array(
				'status' => 'ok',
				'mensaje' => 'El partido se guardó correctamente',
				'content' => View::make('back/listar/partidos', array(
					'partidos' => Partido::all()
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

	// public static function grupo($grupo) {
	// 	$partidos = Partido::select('*', 'partidos.id as id')
	// 		->join('equipos', 'equipos.id', '=', 'partidos.id_equipo_a')
	// 		->where('grupo', '=', $grupo)
	// 		->orderBy('fecha')
	// 		->get();

	// 	return $partidos;
	// }

}