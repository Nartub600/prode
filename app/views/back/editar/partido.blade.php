{{ Form::open(array(
	'action' => 'PartidoController@guardar'
)) }}

<input type="hidden" name="id" value="{{ $partido->id }}" />

<p>
	<label for="id_equipo_a">Equipo A:</label>
	<select name="id_equipo_a" {{ $partido->fase == 'grupos' ? 'disabled' : ''}}>
		<option value="">---</option>
		@foreach($equipos as $equipo)
		<option value="{{ $equipo->id }}" {{ $partido->id_equipo_a == $equipo->id ? 'selected' : '' }}>{{ $equipo->nombre }}</option>
		@endforeach
	</select>
</p>

<p>
	<label for="id_equipo_b">Equipo B:</label>
	<select name="id_equipo_b" {{ $partido->fase == 'grupos' ? 'disabled' : ''}}>
		<option value="">---</option>
		@foreach($equipos as $equipo)
		<option value="{{ $equipo->id }}" {{ $partido->id_equipo_b == $equipo->id ? 'selected' : '' }}>{{ $equipo->nombre }}</option>
		@endforeach
	</select>
</p>

<p>
	<label for="fase">Fase</label>
	<select name="fase" disabled>
		<option value="">---</option>
		@foreach(Config::get('prode.fases') as $fase)
		<option value="{{ $fase }}" {{ $partido->fase == $fase ? 'selected' : '' }}>{{ $fase }}</option>
		@endforeach
	</select>
</p>

<p>
	<label for="goles_a">Goles {{ $partido->equipo_a->nombre }}:</label>
	<input type="text" name="goles_a" value="{{ $partido->goles_a }}" />
</p>

<p>
	<label for="goles_b">Goles {{ $partido->equipo_b->nombre }}:</label>
	<input type="text" name="goles_b" value="{{ $partido->goles_b }}" />
</p>

<a guardar href="#">Guardar</a>

{{ Form::close() }}