<?php

Route::get('aux', function(){

});

Route::get('faltantes/{fase}', function($fase){
    $datos = DB::table('usuarios')
        ->select('nombre', 'apellido', 'email', 'telefono')
        ->whereRaw('id not in (select id_usuario from pronosticos where fase = \'' . $fase . '\' group by id_usuario) and email != "" and deleted_at is null')
        ->get();

    return View::make('back/aux', array(
        'datos' => $datos
    ));
});

Route::get('desempate/{fase}', function($fase) {
    $desempates = Pregunta::where('fase', '=', $fase)->orderBy('id_usuario', 'asc')->get();

    foreach($desempates as $key => $desempate) {
        $usuario = Usuario::withTrashed()->where('id', '=', $desempate->id_usuario)->first();

        if($usuario->deleted_at) {
            unset($desempates[$key]);
        }
    }

    return View::make('back/listar/desempate', array(
        'fase' => $fase,
        'desempates' => $desempates
    ));
});

Route::get('actualizarpuntos/{id}/{fase?}', function($id, $fase = null) {
    // $usuarios = Usuario::where('grupo', '=', '2')
        // ->where('email', '!=', '')
        // ->chunk(2, function($usuarios) {
            // $ahora = Carbon::now();
            // foreach($usuarios as $usuario) {
                $usuario = Usuario::find($id);
                if($fase) {
                    if($fase == 'puntos_candidato') {
                        if($usuario->id_candidato == 1) {
                            if($usuario->act_candidato != true) { // to do
                                $usuario->puntos_candidato = 40;
                                $usuario->act_candidato = true;
                                $usuario->save();
                            }
                        }
                    } else {
                        $pronosticos = Pronostico::where('id_usuario', '=', $id)
                            ->join('partidos', 'pronosticos.id_partido', '=', 'partidos.id')
                            ->where('pronosticos.fase', '=', $fase)
                            ->whereRaw('((pronosticos.goles_a > pronosticos.goles_b and partidos.goles_a > partidos.goles_b) or (pronosticos.goles_a < pronosticos.goles_b and partidos.goles_a < partidos.goles_b) or (pronosticos.goles_a = pronosticos.goles_b and partidos.goles_a = partidos.goles_b))')
                            ->get();
                        $goles = Pronostico::where('id_usuario', '=', $id)
                            ->join('partidos', 'pronosticos.id_partido', '=', 'partidos.id')
                            ->where('pronosticos.fase', '=', $fase)
                            ->whereRaw('((pronosticos.goles_a = partidos.goles_a and pronosticos.goles_b = partidos.goles_b))')
                            ->get();

                        $puntaje = Puntaje::where('id_usuario', '=', $usuario->id)->first();

                        $puntaje->$fase = count($pronosticos) * Config::get('prode.puntaje.partido') + count($goles) * Config::get('prode.puntaje.goles');
                        $puntaje->save();
                    }
                } else {
                    // foreach(Config::get('prode.fases') as $fase) {
                    //  $pronosticos = Pronostico::where('id_usuario', '=', $id)
                    //      ->join('partidos', 'pronosticos.id_partido', '=', 'partidos.id')
                    //      ->where('pronosticos.fase', '=', $fase)
                    //      ->whereRaw('((pronosticos.goles_a > pronosticos.goles_b and partidos.goles_a > partidos.goles_b) or (pronosticos.goles_a < pronosticos.goles_b and partidos.goles_a < partidos.goles_b) or (pronosticos.goles_a = pronosticos.goles_b and partidos.goles_a = partidos.goles_b))')
                    //      ->get();

                    //  $goles = Pronostico::where('id_usuario', '=', $id)
                    //      ->join('partidos', 'pronosticos.id_partido', '=', 'partidos.id')
                    //      ->where('pronosticos.fase', '=', $fase)
                    //      ->whereRaw('((pronosticos.goles_a = partidos.goles_a and pronosticos.goles_b = partidos.goles_b))')
                    //      ->get();
                    // }

                    // $usuario->$fase = count($pronosticos) * Config::get('prode.puntaje.partido') + count($goles) * Config::get('prode.puntaje.goles');
                    // $usuario->save();

                    $usuario->total = $usuario->grupos + $usuario->cuartos + $usuario->semi + $usuario->final + $usuario->puntos_candidato;
                    $usuario->save();
                }

                // $usuarios = Usuario::where('grupo', '=', '2')->where('email', '!=', '')->get();

                return Response::json(array(
                    'status' => 'ok',
                    'id' => $id,
                    'fase' => $fase ? $fase : 'total',
                    'dato' => $fase ? Helpers::puntos_fase($fase, $usuario) : Helpers::puntos_fase('total', $usuario) // cada vez que uso esto me da ganas de vomitar
                ));

                // echo($usuario->email); echo('<br>');
                // echo('Grupos: ' . $usuario->grupos); echo('<br>');
                // echo('Octavos:' . $usuario->octavos); echo('<br>');
                // echo('Cuartos: ' . $usuario->cuartos); echo('<br>');
                // echo('Semi: ' . $usuario->semi); echo('<br>');
                // echo('Final: ' . $usuario->final); echo('<br>');
                // echo('Total: ' . $usuario->puntos); echo('<br>');
            // }
        // });
});

Route::any('logout', array(
    'as' => 'logout',
    function(){
        Auth::logout();
        if(Session::get('end') == 'back') {
            return Redirect::to('back');
        } else {
            return Redirect::to('/');
        }
    }
));

Route::group(array(
    'prefix' => 'back'
), function() {

    Route::group(array(
        'before' => 'admin'
    ), function(){

        Route::get('/', function() {
            return View::make('back/template');
        });

        Route::get('actualizarpuntos', function() {
            $usuarios = Usuario::where('grupo', '=', '2')->where('email', '!=', '')->get();
            return View::make('back/actualizarpuntos', array(
                'usuarios' => $usuarios
            ));
        });


    });

    Route::get('login', function() {
        return View::make('back/login');
    });

});

Route::get('admin', function() {
    return Redirect::to('back');
});

Route::group(array(
    'prefix' => 'ajax',
    'before' => 'ajax'
), function(){

    Route::group(array(
        'prefix' => 'usuario'
    ), function(){

        Route::post('back_login', 'BackController@login');
        Route::post('front_login', 'FrontController@login');
        Route::post('guardar_perfil', 'UsuarioController@guardar_perfil');

    });

    Route::group(array(
        'prefix' => 'listar'
    ), function(){

        Route::get('equipos', 'EquipoController@listar');
        Route::get('partidos', 'PartidoController@listar');
        Route::get('usuarios', 'UsuarioController@listar');
        Route::get('pronosticos', 'PronosticoController@listar');
        Route::get('grupos', 'GrupoController@listar');
        Route::get('fechas', 'FechaController@listar');
        Route::get('novedades', 'NovedadController@listar');
        Route::get('mensajes', 'MensajeController@listar');
        Route::get('posiciones', 'PosicionController@listar');
        Route::get('respuestas', 'RespuestaController@listar');

    });

    Route::group(array(
        'prefix' => 'agregar'
    ), function(){

        Route::get('equipo', 'EquipoController@agregar');
        Route::get('partido', 'PartidoController@agregar');
        Route::get('usuario', 'UsuarioController@agregar');
        Route::get('pronostico', 'PronosticoController@agregar');
        Route::get('novedad', 'NovedadController@agregar');

    });

    Route::group(array(
        'prefix' => 'editar'
    ), function(){

        Route::get('partido', 'PartidoController@editar');
        Route::get('fecha', 'FechaController@editar');
        Route::get('novedad', 'NovedadController@editar');
        Route::get('respuesta', 'RespuestaController@editar');

    });

    Route::group(array(
        'prefix' => 'guardar'
    ), function(){

        Route::post('equipo', 'EquipoController@guardar');
        Route::post('partido', 'PartidoController@guardar');
        Route::post('usuario', 'UsuarioController@guardar');
        Route::post('pronostico', 'PronosticoController@guardar');
        Route::post('fase', 'PronosticoController@guardar_fase');
        Route::post('respuesta', 'PreguntaController@guardar_respuesta');
        Route::post('mensaje', 'MensajeController@guardar');
        Route::post('fecha', 'FechaController@guardar');
        Route::post('novedad', 'NovedadController@guardar');
        Route::post('posicion', 'PosicionController@guardar');
        Route::post('respuesta', 'RespuestaController@guardar');

    });

    Route::group(array(
        'prefix' => 'eliminar'
    ), function() {

        Route::post('mensaje', 'MensajeController@eliminar');
        Route::post('usuario', 'UsuarioController@toggle');
        Route::post('novedad', 'NovedadController@toggle');
        Route::post('posicion', 'PosicionController@eliminar');

    });

});

Route::get('/', 'FrontController@index');

Route::group(array(
    'before' => 'auth'
), function(){

    Route::get('mi-perfil', function(){
        return View::make('front/perfil');
    });

    Route::group(array(
        'before' => 'perfil'
    ), function(){

        Route::get('fixture', function(){
            return View::make('front/fixture');
        });

        Route::get('tabla-general', function(){
            return View::make('front/tabla-general');
        });

        Route::get('premios', function(){
            return View::make('front/premios');
        });

        Route::get('novedades', function(){
            return View::make('front/novedades');
        });

        Route::get('novedad/{id}', function($id){
            return View::make('front/novedad', array(
                'novedad' => Novedad::find($id)
            ));
        });

        Route::get('extras', function(){
            return View::make('front/extras');
        });

    });

});