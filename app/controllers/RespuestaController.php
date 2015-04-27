<?php

class RespuestaController extends BaseController {

	public function listar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/respuestas', array(
				'respuestas' => Respuesta::all()
			))->render()
		));
	}

	public function editar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/editar/respuesta', array(
				'respuesta' => Respuesta::find(Input::get('id_respuesta'))
			))->render()
		));
	}

	public static function guardar() {
		// $data = Input::all();

		// $rules = array(
		// 	'respuesta' => 'required'
		// );

		// $messages = array(
		// 	'respuesta.required' => 'No ingresaste una cantidad'
		// );

		// $validator = Validator::make($data, $rules, $messages);

		// if($validator->passes()) {
			$respuesta = Respuesta::find(Input::get('id_respuesta'));
			$respuesta->respuesta = Input::get('respuesta');
			$respuesta->save();

			return Response::json(array(
				'status' => 'ok',
				'content' => View::make('back/listar/respuestas', array(
					'respuestas' => Respuesta::all()
				))->render()
			));
		// } else {
		// 	return Response::json(array(
		// 		'status' => 'error',
		// 		'validator' => $validator->messages()->toArray()
		// 	));
		// }
	}

}