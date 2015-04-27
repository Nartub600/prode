<h1>Grupo {{ strtoupper($grupo) }}</h1>
<table>
	<tr>
		<th>Equipo</th>
		<th>Puntos</th>
		<th>PJ</th>
		<th>PG</th>
		<th>PE</th>
		<th>PP</th>
		<th>GF</th>
		<th>GC</th>
		<th>DIF</th>
	</tr>
	@foreach($equipos as $equipo)
	<?php $estadisticas = Helpers::estadisticas($equipo) ?>
	<tr>
		<td>{{ $equipo->nombre }}</td>
		<td>{{ $estadisticas->puntos }}</td>
		<td>{{ $estadisticas->pj }}</td>
		<td>{{ $estadisticas->pg }}</td>
		<td>{{ $estadisticas->pe }}</td>
		<td>{{ $estadisticas->pp }}</td>
		<td>{{ $estadisticas->gf }}</td>
		<td>{{ $estadisticas->gc }}</td>
		<td>{{ $estadisticas->dif }}</td>
	</tr>
	@endforeach
</table>