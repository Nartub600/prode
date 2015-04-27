<?php

class UsuarioController extends BaseController {

    public function listar() {
        return Response::json(array(
            'status' => 'ok',
            'content' => View::make('back/listar/usuarios', array(
                'usuarios' => Usuario::withTrashed()->get()
            ))->render()
        ));
    }

    public function agregar() {
        return Response::json(array(
            'status' => 'ok',
            'content' => View::make('back/agregar/usuario', array(
                'equipos' => Equipo::all()
            ))->render()
        ));
    }

    public function guardar() {
        $data = Input::all();

        $rules = array(
            'nick' => 'required',
            'password' => 'required',
            'grupo' => 'required',
            // 'id_torneo' => 'required'
        );

        $messages = array(
            'nick.required'      => 'El nombre de usuario es obligatorio',
            'nick.unique'        => 'El nombre de usuario no está disponible',
            'password.required'  => 'La contraseña es obligatoria',
            'grupo.required'     => 'Es obligatorio elegir un tipo de usuario',
            'id_torneo.required' => 'Es obligatorio elegir un torneo'
        );

        $validator = Validator::make($data, $rules, $messages);

        if($validator->passes()) {
            $usuario = new Usuario;
            $usuario->nick = Input::get('nick');
            $usuario->password = Hash::make(Input::get('password'));
            $usuario->grupo = Input::get('grupo');
            // $usuario->id_torneo = Input::get('id_torneo');
            $usuario->save();

            $puntaje = new Puntaje;
            $puntaje->id_usuario = $usuario->id;
            $puntaje->save();

            return Response::json(array(
                'status' => 'ok',
                'mensaje' => 'El usuario se guardó correctamente',
                'content' => View::make('back/listar/usuarios', array(
                    'usuarios' => Usuario::all()
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

    public function guardar_perfil() {
        $data = Input::all();

        $rules = array(
            'telefono'  => 'required',
            'localidad' => 'required',
            'nombre'    => 'required',
            'apellido'  => 'required',
            'apodo'     => 'required',
            // 'foto'      => 'required',
            'candidato' => 'required'
        );

        $messages = array(
            'telefono.required'  => 'El teléfono es obligatorio',
            'localidad.required' => 'La localidad es obligatoria',
            'nombre.required'    => 'El nombre es obligatorio',
            'apellido.required'  => 'El apellido es obligatorio',
            'apodo.required'     => 'El apodo es obligatorio',
            // 'foto.required'      => 'La foto es obligatoria',
            'candidato.required' => 'Debes elegir un candidato'
        );

        if(Input::get('edicion') == 'no') {
            $rules['email'] = 'required|email|confirmed|unique:usuarios';
            $rules['bases'] = 'accepted';
            $messages['email.required'] = 'El email es obligatorio';
            $messages['email.email'] = 'La dirección de email debe ser válida';
            $messages['email.confirmed'] = 'Los emails no coinciden';
            $messages['email.unique'] = 'Ya hay un usuario registrado con ese email';
            $messages['bases.accepted'] = 'Debes aceptar los términos y condiciones';
        }

        $validator = Validator::make($data, $rules, $messages);

        if($validator->passes()) {
            $usuario = Auth::user();
            $usuario->email = Input::get('email');
            $usuario->telefono = Input::get('telefono');
            $usuario->localidad = Input::get('localidad');
            $usuario->nombre = Input::get('nombre');
            $usuario->apellido = Input::get('apellido');
            $usuario->apodo = Input::get('apodo');
            $usuario->email = Input::get('email');
            if(Input::hasFile('foto')) {
                Input::file('foto')->move(public_path() . '/uploads/fotos', Auth::user()->id . '.' . Input::file('foto')->getClientOriginalExtension());
                $usuario->foto = Auth::user()->id . '.' . Input::file('foto')->getClientOriginalExtension();
            }
            $usuario->id_candidato = Input::get('candidato');

            $usuario->save();

            return Response::json(array(
                'status' => 'ok',
                'mensaje' => 'Perfil guardado correctamente',
                'url' => url('fixture')
            ));
        } else {
            return Response::json(array(
                'status' => 'error',
                'validator' => $validator->messages()->toArray()
            ));
        }
    }

    public function toggle() {
        $usuario = Usuario::withTrashed()->where('id', '=', Input::get('id_usuario'))->first();

        if($usuario->deleted_at) {
            $usuario->restore();
        } else {
            $usuario->delete();
        }

        return $this->listar();
    }

}