<?php

class PreguntaController extends BaseController {

	public static function guardar_respuesta($fase, $respuesta) {
		// $data = Input::all();

		// $rules = array(
		// 	'respuesta' => 'required'
		// );

		// $messages = array(
		// 	'respuesta.required' => 'No ingresaste una cantidad'
		// );

		// $validator = Validator::make($data, $rules, $messages);

		// if($validator->passes()) {
			$pregunta = new Pregunta;
			$pregunta->id_usuario = Auth::user()->id;
			$pregunta->fase = $fase;
			$pregunta->respuesta = $respuesta;
			$pregunta->save();

			// return Response::json(array(
			// 	'status' => 'ok'
			// ));
		// } else {
		// 	return Response::json(array(
		// 		'status' => 'error',
		// 		'validator' => $validator->messages()->toArray()
		// 	));
		// }
	}

}