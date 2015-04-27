<?php

class FrontController extends BaseController {

	public function index() {
		if(Auth::check()) {
			if(Auth::user()->email || Auth::user()->isAdmin()) {
				return Redirect::to('fixture');
			} else {
				return Redirect::to('mi-perfil');
			}
		} else {
			return View::make('front/index');
		}
	}

	public function login() {
		$data = Input::all();

		$rules = array(
			'nick' => 'required',
			'password' => 'required'
		);

		$messages = array(
			'nick.required' => 'El nombre de usuario es obligatorio',
			'password.required' => 'La contraseña es obligatoria'
		);

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes()) {
			if(Auth::attempt(array(
				'nick' => Input::get('nick'),
				'password' => Input::get('password')
				// 'grupo' => 2
			))) {
				Session::put('end', 'front');
				return Response::json(array(
					'status' => 'ok'
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
				'validator' => $validator->messages()->toArray()
			));
		}
	}

}