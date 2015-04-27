<?php

class GrupoController extends BaseController {

	public function listar() {
		return Response::json(array(
			'status' => 'ok',
			'content' => View::make('back/listar/grupos')->render()
		));
	}

	public static function dibujar_grupo($grupo) {
		// $equipos = Equipo::where('grupo', '=', $grupo)->get();
		$equipos = Helpers::ordenar_grupo($grupo);

		return View::make('back/listar/grupo', array(
			'grupo' => $grupo,
			'equipos' => $equipos
		))->render();
	}

}