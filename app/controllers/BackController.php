<?php

class BackController extends BaseController {

	public function login() {
		$data = Input::all();

		$rules = array(
			'nick' => 'required',
			'password' => 'required'
		);

		$messages = array(
			'nick.required' => 'Hace falta ingresar el nombre de usuario',
			'password.required' => 'La contraseña es obligatoria'
		);

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes()) {
			if(Auth::attempt(array(
				'nick' => Input::get('nick'),
				'password' => Input::get('password'),
				'grupo' => 1
			))) {
				Session::put('end', 'back');
				return Response::json(array(
					'status' => 'ok',
					'url' => url('back')
				));
			} else {
				return Response::json(array(
					'status' => 'error',
					'mensaje' => 'No existe usuario'
				));
			}
		} else {
			return Response::json(array(
				'status' => 'error',
				'validator' => $validator->messages->toArray()
			));
		}
	}

}