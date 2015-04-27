{{ Form::open(array(
	'action' => 'UsuarioController@guardar'
)) }}

<p>
	<label for="nick">Usuario:</label>
	<input type="text" name="nick" />
</p>

<p>
	<label for="password">Contraseña:</label>
	<input type="text" name="password" />
</p>

<p>
	<label for="grupo">Tipo:</label>
	<select name="grupo">
		<option value="">---</option>
		@foreach(Config::get('prode.grupos_de_usuario') as $key => $grupo)
		<option value="{{ $key }}">{{ $grupo }}</option>
		@endforeach
	</select>
</p>

{{--
<p>
	<label for="id_torneo">Torneo:</label>
	<select name="id_torneo">
		<option value="">---</option>
		@foreach(Config::get('prode.torneos') as $key => $torneo)
		<option value="{{ $key }}">{{ $torneo }}</option>
		@endforeach
	</select>
</p>
--}}

<!-- <p>
	<label for="email">Email:</label>
	<input type="text" name="email" />
</p> -->

<!-- <p>
	<label for="telefono">Teléfono:</label>
	<input type="text" name="telefono" />
</p> -->

<!-- <p>
	<label for="localidad">Localidad:</label>
	<input type="text" name="localidad" />
</p> -->

<!-- <p>
	<label for="nombre">Nombre:</label>
	<input type="text" name="nombre" />
</p> -->

<!-- <p>
	<label for="apellido">Apellido:</label>
	<input type="text" name="apellido" />
</p> -->

<!-- <p>
	<label for="apodo">Apodo:</label>
	<input type="text" name="apodo" />
</p> -->

<!-- <p>
	<label for="foto">Foto:</label>
	<input type="file" name="foto" />
</p> -->

<!-- <p>
	<label for="id_candidato">Candidato:</label>
	<select name="id_candidato">
		<option value="">---</option>
		@foreach($equipos as $equipo)
		<option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
		@endforeach
	</select>
</p> -->

<a guardar href="#">Guardar</a>

{{ Form::close() }}