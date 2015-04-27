{{ Form::open(array(
    'action' => 'EquipoController@guardar'
)) }}

<p>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" />
</p>

<p>
    <label for="grupo">Grupo:</label>
    @foreach(Config::get('prode.grupos') as $grupo)
    <input type="radio" name="grupo" value="{{ Str::upper($grupo) }}" />{{ Str::upper($grupo) }}
    @endforeach
</p>

<a guardar href="#">Guardar</a>

{{ Form::close() }}