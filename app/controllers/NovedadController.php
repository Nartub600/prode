<?php

class NovedadController extends BaseController {

	public function listar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/novedades', array(
				'novedades' => Novedad::withTrashed()->get()
			))->render()
		));
	}

	public function agregar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/agregar/novedad')->render()
		));
	}

	public function editar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/editar/novedad', array(
				'novedad' => Novedad::find(Input::get('id_novedad'))
			))->render()
		));
	}

	public function guardar() {
		$data = Input::all();

		$rules = array(
			// 'fase' => 'required',
			'titulo' => 'required',
			'texto' => 'required'
		);

		$messages = array(
			// 'fase.required' => 'La fase es obligatoria',
			'titulo.required' => 'Hay que ingresar un título',
			'texto.required' => 'Hay que ingresar un texto'
		);

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes()) {
			$novedad = Input::has('id_novedad') ? Novedad::find(Input::get('id_novedad')) : new Novedad;
			$novedad->titulo = Input::get('titulo');
			$novedad->texto = Input::get('texto');
			$novedad->save();

			return Response::json(array(
				'status' => 'ok',
				'mensaje' => 'La novedad se guardó correctamente',
				'content' => View::make('back/listar/novedades', array(
					'novedades' => Novedad::all()
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

	public function toggle() {
		$novedad = Novedad::withTrashed()->where('id', '=', Input::get('id_novedad'))->first();

		if($novedad->deleted_at) {
			$novedad->restore();
		} else {
			$novedad->delete();
		}

		return $this->listar();
	}

}