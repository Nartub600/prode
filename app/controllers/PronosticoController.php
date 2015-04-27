<?php

class PronosticoController extends BaseController {

	public function listar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/pronosticos', array(
				'pronosticos' => Pronostico::all()
			))->render()
		));
	}

	public function agregar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/agregar/pronostico', array(
				'partidos' => Partido::all()
			))->render()
		));
	}

	public function guardar() {
		$data = Input::all();

		$rules = array(
			'id_partido' => 'required',
			'goles_a' => 'required',
			'goles_b' => 'required'
		);

		$messages = array(
			'id_partido.required' => 'Se debe elegir un partido',
			'goles_a' => 'Faltan los goles del primer equipo',
			'goles_b' => 'Faltan los goles del segundo equipo'
		);

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes()) {
			$pronostico = new Pronostico;

			$pronostico->id_usuario = Auth::user()->id;
			$pronostico->id_partido = Input::get('id_partido');
			$pronostico->goles_a = Input::get('goles_a');
			$pronostico->goles_b = Input::get('goles_b');

			$pronostico->save();

			return Response::json(array(
				'status' => 'ok',
				'mensaje' => 'Se ha guardado el pronóstico',
				'content' => View::make('back/listar/pronosticos', array(
					'pronosticos' => Pronostico::all()
				))->render()
			));
		} else {
			return Response::json(array(
				'status' => 'error',
				'validator' => $validator->messages()->toArray()
			));
		}
	}

	// public function guardar_grupos() {
	// 	$data = Input::except('_token');
	// 	$partidos = Partido::all();

	// 	$rules = array();
	// 	$messages = array();

	// 	foreach($partidos as $partido) {
	// 		$rules["p{$partido->id}"] = 'required';
	// 		$messages["p{$partido->id}" . '.required'] = "Falta completar el partido {$partido->equipo_a->nombre} vs. {$partido->equipo_b->nombre}";
	// 	}

	// 	$rules['respuesta'] = 'required';
	// 	$messages['respuesta.required'] = 'Falta completar la pregunta desempate';

	// 	$validator = Validator::make($data, $rules, $messages);

	// 	if($validator->passes()) {
	// 		Pronostico::where('id_usuario', '=', Auth::user()->id)->where('fase', '=', 'grupos')->delete();

	// 		$data = Input::except('_token', 'respuesta');
	// 		foreach($data as $id_partido => $resultado) {
	// 			$pronostico = new Pronostico;
	// 			$pronostico->id_usuario = Auth::user()->id;
	// 			$pronostico->id_partido = substr($id_partido, 1, strlen($id_partido) - 1);
	// 			switch($resultado) {
	// 				case 'a':
	// 					$pronostico->goles_a = 1000;
	// 					$pronostico->goles_b = 0;
	// 					break;
	// 				case 'b':
	// 					$pronostico->goles_a = 0;
	// 					$pronostico->goles_b = 1000;
	// 					break;
	// 				case 'e':
	// 					$pronostico->goles_a = 1000;
	// 					$pronostico->goles_b = 1000;
	// 					break;
	// 			}
	// 			$pronostico->save();
	// 		}

	// 		Pregunta::where('id_usuario', '=', Auth::user()->id)->where('fase', '=', 'grupos')->delete();
	// 		PreguntaController::guardar_respuesta('grupos', Input::get('respuesta'));

	// 		return Response::json(array(
	// 			'status' => 'ok'
	// 		));
	// 	} else {
	// 		return Response::json(array(
	// 			'status' => 'error',
	// 			'validator' => $validator->messages()->toArray()
	// 		));
	// 	}
	// }

	public function guardar_fase() {
		$fase = Input::get('fase');
		$partidos = Partido::where('fase', '=', $fase)->get();

		$data = Input::all();

		$rules = array();
		$messages = array();

		switch($fase) {
			case 'grupos':
				foreach($partidos as $partido) {
					$rules["p{$partido->id}"] = 'required';
					$messages["p{$partido->id}.required"] = "Falta completar el resultado {$partido->equipo_a->nombre} vs. {$partido->equipo_b->nombre}";
				}
				// $rules['ahora'] = 'before:' . Fecha::where('fase', '=', 'grupos')->first()->hasta->format('Y/m/d') . '|' . 'after:' . Fecha::where('fase', '=', 'grupos')->first()->desde->format('Y/m/d');
				// $messages['ahora.after'] = 'Todavía no se pueden cargar los pronósticos de la fase de grupos';
				// $messages['ahora.before'] = 'Se acabó el tiempo para modificar los pronósticos de la fase de grupos';
				break;
			case 'octavos':
				foreach($partidos as $partido) {
					$rules["a{$partido->id}"] = "required";
					$rules["b{$partido->id}"] = "required";
					$messages["a{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_a->nombre}";
					$messages["b{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_b->nombre}";
				}
				// $rules['ahora'] = 'before:' . Fecha::where('fase', '=', 'octavos')->first()->hasta->format('Y/m/d') . '|' . 'after:' . Fecha::where('fase', '=', 'octavos')->first()->desde->format('Y/m/d');
				// $messages['ahora.after'] = 'Todavía no se pueden cargar los pronósticos de la fase de octavos de final';
				// $messages['ahora.before'] = 'Se acabó el tiempo para modificar los pronósticos de la fase de octavos de final';
				break;
			case 'cuartos':
				foreach($partidos as $partido) {
					$rules["a{$partido->id}"] = "required";
					$rules["b{$partido->id}"] = "required";
					$messages["a{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_a->nombre}";
					$messages["b{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_b->nombre}";
				}
				// $rules['ahora'] = 'before:' . Fecha::where('fase', '=', 'cuartos')->first()->hasta->format('Y/m/d') . '|' . 'after:' . Fecha::where('fase', '=', 'cuartos')->first()->desde->format('Y/m/d');
				// $messages['ahora.after'] = 'Todavía no se pueden cargar los pronósticos de la fase de cuartos de final';
				// $messages['ahora.before'] = 'Se acabó el tiempo para modificar los pronósticos de la fase de cuartos de final';
				break;
			case 'semi':
				foreach($partidos as $partido) {
					$rules["a{$partido->id}"] = "required";
					$rules["b{$partido->id}"] = "required";
					$messages["a{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_a->nombre}";
					$messages["b{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_b->nombre}";
				}
				// $rules['ahora'] = 'before:' . Fecha::where('fase', '=', 'semi')->first()->hasta->format('Y/m/d') . '|' . 'after:' . Fecha::where('fase', '=', 'semi')->first()->desde->format('Y/m/d');
				// $messages['ahora.after'] = 'Todavía no se pueden cargar los pronósticos de la fase de semifinal';
				// $messages['ahora.before'] = 'Se acabó el tiempo para modificar los pronósticos de la fase de semifinal';
				break;
			// case 'tercero':
			// 	foreach($partidos as $partido) {
			// 		$rules["a{$partido->id}"] = "required";
			// 		$rules["b{$partido->id}"] = "required";
			// 		$messages["a{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_a->nombre}";
			// 		$messages["b{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_b->nombre}";
			// 	}
			// 	$rules['ahora'] = 'before:' . Fecha::where('fase', '=', 'tercero')->first()->hasta->format('Y/m/d') . '|' . 'after:' . Fecha::where('fase', '=', 'tercero')->first()->desde->format('Y/m/d');
			// 	$messages['ahora.after'] = 'Todavía no se puede cargar el pronóstico del partido de tercer puesto';
			// 	$messages['ahora.before'] = 'Se acabó el tiempo para modificar el pronóstico del partido de tercer puesto';
			// 	break;
			case 'final':
				foreach($partidos as $partido) {
					$rules["a{$partido->id}"] = "required";
					$rules["b{$partido->id}"] = "required";
					$messages["a{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_a->nombre}";
					$messages["b{$partido->id}.required"] = "Falta completar los goles de {$partido->equipo_b->nombre}";
				}
				// $rules['ahora'] = 'before:' . Fecha::where('fase', '=', 'final')->first()->hasta->format('Y/m/d') . '|' . 'after:' . Fecha::where('fase', '=', 'final')->first()->desde->format('Y/m/d');
				// $messages['ahora.after'] = 'Todavía no se pueden cargar los pronósticos de la final';
				// $messages['ahora.before'] = 'Se acabó el tiempo para modificar los pronósticos de la final';
				break;
		}
		$rules['respuesta'] = 'required';
		$messages['respuesta.required'] = 'Falta completar la pregunta desempate';

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes()) {
			Pronostico::where('id_usuario', '=', Auth::user()->id)->where('fase', '=', $fase)->delete();
			Pregunta::where('id_usuario', '=', Auth::user()->id)->where('fase', '=', $fase)->delete();

			foreach($partidos as $partido) {
				$resultado = Input::get('p' . $partido->id);
				switch($resultado) {
					case 'a':
						$goles_a = 1000;
						$goles_b = 0;
						break;
					case 'b':
						$goles_a = 0;
						$goles_b = 1000;
						break;
					case 'e':
						$goles_a = 1000;
						$goles_b = 1000;
						break;
					default:
						$goles_a = Input::get("a{$partido->id}");
						$goles_b = Input::get("b{$partido->id}");
						break;
				}
				Pronostico::create(array(
					'fase' => $fase,
					'id_usuario' => Auth::user()->id,
					'id_partido' => $partido->id,
					'goles_a' => $goles_a,
					'goles_b' => $goles_b
				));
			}

			Pregunta::create(array(
				'fase' => $fase,
				'id_usuario' => Auth::user()->id,
				'respuesta' => Input::get('respuesta')
			));

			return Response::json(array(
				'status' => 'ok'
			));
		} else {
			return Response::json(array(
				'status' => 'error',
				'validator' => $validator->messages()->toArray()
			));
		}
	}

}