<table>
	<tr>
		<th>ID</th>
		<th>Usuario</th>
		<th>Partido</th>
		<th>Goles A</th>
		<th>Goles B</th>
		<th>Puntaje</th>
	</tr>
	@foreach($pronosticos as $pronostico)
	<tr>
		<td>{{ $pronostico->id }}</td>
		<td>{{ $pronostico->usuario->email }}</td>
		<td>{{ $pronostico->partido->equipo_a->nombre }} - {{ $pronostico->partido->equipo_b->nombre }} ({{ $pronostico->partido->equipo_a->grupo }})</td>
		<td>{{ $pronostico->goles_a }}</td>
		<td>{{ $pronostico->goles_b }}</td>
		<td>{{ Helpers::calcular_puntos($pronostico) }}</td>
	</tr>
	@endforeach
</table>