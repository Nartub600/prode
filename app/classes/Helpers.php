<?php

class Helpers {

	public static function posicion(Usuario $usuario) {
		$participantes = Helpers::ordenar_participantes();
		$posicion = 1;
		foreach($participantes as $participante) {
			if($participante->id == $usuario->id) {
				break;
			}
			$posicion++;
		}
		return $posicion;
	}

	public static function posicion_fase(Usuario $usuario, $fase) {
		$ahora = Carbon::now();

		$hasta = Fecha::where('fase', '=', $fase)->first()->hasta;

		if($ahora->gt($hasta)) {
			$participantes = Usuario::where('grupo', '=', '2')
				->where('email', '!=', '')
				->get();

			@$participantes->sort(function($a, $b) use($fase) {
				$aa = Helpers::puntos_fase($fase, $a);
				$bb = Helpers::puntos_fase($fase, $b);

				if($aa > $bb) {
					return -1;
				} else if($aa < $bb) {
					return 1;
				} else {
					return 0;
				}
			});

			$posicion = 1;
			foreach($participantes as $participante) {
				if($participante->id == $usuario->id) {
					break;
				}
				$posicion++;
			}
			return $posicion;
		} else {
			return false;
		}
	}

	public static function ordenar_participantes($id_torneo = null) {
		$participantes = Usuario::where('grupo', '=', '2')->where('email', '!=', '')->orderBy('puntos', 'desc')->get();

		// $participantes->sort(function($a, $b) {
		// 	$a = Helpers::puntos($a);
		// 	$b = Helpers::puntos($b);

		// 	if($a > $b) {
		// 		return -1;
		// 	} else if($a < $b) {
		// 		return 1;
		// 	} else {
		// 		return 0;
		// 	}
		// });

		return $participantes;
	}

        public static function listar_participantes($id_torneo = null) {
		$participantes = Usuario::where('grupo', '=', '2')
			// ->where('id_torneo', '=', $id_torneo)
			->where('email', '!=', '')
			// ->where('id_torneo', '=', Auth::user()->id_torneo)
			->get();



		return $participantes;
	}

	public static function ordenar_fase($fase, $id_torneo = null) {
		$participantes = Usuario::where('grupo', '=', '2')
			->where('email', '!=', '')
			->get();

		@$participantes->sort(function($a, $b) use($fase) {
			$a = Helpers::puntos_fase($fase, $a);
			$b = Helpers::puntos_fase($fase, $b);

			if($a > $b) {
				return -1;
			} else if($a < $b) {
				return 1;
			} else {
				return 0;
			}
		});

		return $participantes;
	}

	public static function puntos($usuario) {
		// $puntos = 0;

		// foreach(Config::get('prode.fases') as $fase) {
		// 	$puntos = $puntos + Helpers::puntos_fase($fase, $usuario);
		// }

		// $pronosticos = Pronostico::where('id_usuario', '=', $usuario->id)->get();

		// if(count($pronosticos) != 0) {
		// 	foreach($pronosticos as $pronostico) {
		// 		$puntos = $puntos + Helpers::calcular_puntos($pronostico);
		// 	}
		// }

		return $usuario->puntos;
	}

	public static function puntos_fase($fase, $usuario) {
		// $pronosticos = Pronostico::where('id_usuario', '=', $usuario->id)->where('fase', '=', $fase)->get();

		// $puntos = 0;

		// if(count($pronosticos) != 0) {
		// 	foreach($pronosticos as $pronostico) {
		// 		$puntos = $puntos + Helpers::calcular_puntos($pronostico);
		// 	}
		// }

		// return $usuario->$fase;
		return Puntaje::where('id_usuario', '=', $usuario->id)->first()->$fase;
	}

	public static function goles_fase($fase) {
		$goles = 0;

		$partidos = Partido::where('fase', '=', $fase)->get();

		foreach($partidos as $partido) {
			$goles = $goles + $partido->goles_a + $partido->goles_b;
		}

		return $goles;
	}

	public static function ordenar_grupo($grupo) {
		$equipos = Equipo::where('grupo', '=', $grupo)->get();

		$equipos->sort(function($a, $b) {
			$a = Helpers::estadisticas($a);
			$b = Helpers::estadisticas($b);

			if($a->puntos > $b->puntos) {
				return -1;
			} else if($a->puntos < $b->puntos) {
				return 1;
			} else {
				if($a->dif > $b->dif) {
					return -1;
				} else if($a->dif < $b->dif) {
					return 1;
				} else {
					if($a->gf > $b->gf) {
						return -1;
					} else if($a->gf < $b->gf) {
						return 1;
					} else {
						return 0;
					}
				}
			}
		});

		return $equipos;
	}

	public static function resultado_pronostico(Pronostico $pronostico) {
		if(!is_null($pronostico->goles_a) && !is_null($pronostico->goles_b)) {
			if($pronostico->goles_a > $pronostico->goles_b) {
				$resultado_pronostico = 'a';
			} else if($pronostico->goles_a < $pronostico->goles_b) {
				$resultado_pronostico = 'b';
			} else if($pronostico->goles_a == $pronostico->goles_b) {
				$resultado_pronostico = 'e';
			}
		} else {
			$resultado_pronostico = 'n';
		}

		return $resultado_pronostico;
	}

	public static function resultado_partido(Partido $partido) {
		if(!is_null($partido->goles_a) && !is_null($partido->goles_b)) {
			if($partido->goles_a > $partido->goles_b) {
				$resultado_partido = 'a';
			} else if($partido->goles_a < $partido->goles_b) {
				$resultado_partido = 'b';
			} else if($partido->goles_a == $partido->goles_b) {
				$resultado_partido = 'e';
			}
		} else {
			$resultado_partido = 'n';
		}

		return $resultado_partido;
	}

	public static function calcular_puntos(Pronostico $pronostico) {
		$puntos = 0;

		$resultado_pronostico = Helpers::resultado_pronostico($pronostico);

 		$resultado_partido = Helpers::resultado_partido($pronostico->partido);

 		if($resultado_partido != 'n') {
			if($resultado_pronostico == $resultado_partido) {
				$puntos = $puntos + Config::get('prode.puntaje.partido');

				if($pronostico->goles_a == $pronostico->partido->goles_a && $pronostico->goles_b == $pronostico->partido->goles_b) {
					$puntos = $puntos + Config::get('prode.puntaje.goles');
				}
			}
 		}

		return $puntos;
	}

	public static function estadisticas(Equipo $equipo) {
		$jugados = Partido::whereRaw("(id_equipo_a = {$equipo->id} and goles_a is not null) or (id_equipo_b = {$equipo->id} and goles_b is not null)")->count();
		$ganados = Partido::whereRaw("(id_equipo_a = {$equipo->id} and goles_a > goles_b) or (id_equipo_b = {$equipo->id} and goles_a < goles_b)")->count();
		$perdidos = Partido::whereRaw("(id_equipo_a = {$equipo->id} and goles_a < goles_b) or (id_equipo_b = {$equipo->id} and goles_a > goles_b)")->count();
		$empatados = Partido::whereRaw("(id_equipo_a = {$equipo->id} or id_equipo_b = {$equipo->id}) and goles_a = goles_b")->count();
		$goles_a_favor = Partido::whereRaw("id_equipo_a = {$equipo->id}")->sum('goles_a') + Partido::whereRaw("id_equipo_b = {$equipo->id}")->sum('goles_b');
		$goles_en_contra = Partido::whereRaw("id_equipo_a = {$equipo->id}")->sum('goles_b') + Partido::whereRaw("id_equipo_b = {$equipo->id}")->sum('goles_a');

		return (object) array(
			'puntos' => $ganados * 3 + $empatados,
			'pj' => $jugados,
			'pg' => $ganados,
			'pp' => $perdidos,
			'pe' => $empatados,
			'gf' => $goles_a_favor,
			'gc' => $goles_en_contra,
			'dif' => $goles_a_favor - $goles_en_contra
		);
	}

}