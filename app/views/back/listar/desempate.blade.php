<h1>Respuestas a la pregunta desempate de <em>{{ $fase }}</em></h1>

<table>
	<tr>
		<th>ID Usuario</th>
		<th>Usuario</th>
		<th>Respuesta</th>
	</tr>
	@foreach($desempates as $desempate)
	<tr>
		<td>{{ $desempate->usuario->id }}</td>
		<td>{{ $desempate->usuario->email }}</td>
		<td>{{ $desempate->respuesta }}</td>
	</tr>
	@endforeach
</table>