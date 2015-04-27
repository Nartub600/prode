{{ Form::open(array(
	'action' => 'PartidoController@guardar'
)) }}

<p>
	<label for="id_equipo_a">Equipo A:</label>
	<select name="id_equipo_a">
		<option value="">---</option>
		@foreach($equipos as $equipo)
		<option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
		@endforeach
	</select>
</p>

<p>
	<label for="id_equipo_b">Equipo B:</label>
	<select name="id_equipo_b">
		<option value="">---</option>
		@foreach($equipos as $equipo)
		<option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
		@endforeach
	</select>
</p>

<p>
	<label for="fase">Fase</label>
	<select name="fase">
		<option value="">---</option>
		@foreach(Config::get('prode.fases') as $fase)
		<option value="{{ $fase }}">{{ $fase }}</option>
		@endforeach
	</select>
</p>

<a guardar href="#">Guardar</a>

{{ Form::close() }}