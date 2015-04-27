<?php

class MensajeController extends BaseController {

	public function listar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/mensajes', array(
				'mensajes' => Mensaje::orderBy('created_at', 'desc')->get()
			))->render()
		));
	}

	public function eliminar() {
		Mensaje::destroy(Input::get('id_mensaje'));

		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/mensajes', array(
				'mensajes' => Mensaje::orderBy('created_at', 'desc')->get()
			))->render()
		));
	}

	public function guardar() {
		$data = Input::all();

		$rules = array(
			'texto' => 'required'
		);

		$messages = array(
			'texto.required' => 'Debes ingresar un mensaje'
		);

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes()) {
			Mensaje::create(array(
				'id_usuario' => Auth::user()->id,
				'texto' => Input::get('texto')
			));

			return Response::json(array(
				'status' => 'ok',
				'html' => View::make('front/content-mensajes')->render()
			));
		} else {
			return Response::json(array(
				'status' => 'error',
				'validator' => $validator->messages()->toArray()
			));
		}
	}

}