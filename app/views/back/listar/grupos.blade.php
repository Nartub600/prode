@foreach(Config::get('prode.grupos') as $grupo)
{{ GrupoController::dibujar_grupo($grupo) }}
@endforeach