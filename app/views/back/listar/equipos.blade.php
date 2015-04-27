<table>
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Grupo</th>
	</tr>
	@foreach($equipos as $equipo)
	<tr>
		<td>{{ $equipo->id }}</td>
		<td>{{ $equipo->nombre }}</td>
		<td>{{ $equipo->grupo }}</td>
	</tr>
	@endforeach
</table>