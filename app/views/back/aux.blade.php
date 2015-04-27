<html>
	<head>
	</head>
	<body>
		<table>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Teléfono</th>
			</tr>
			@foreach($datos as $dato)
			<tr>
				<td>{{ $dato->nombre }}</td>
				<td>{{ $dato->apellido }}</td>
				<td>{{ $dato->email }}</td>
				<td>{{ $dato->telefono }}</td>
			</tr>
			@endforeach
		</table>
	</body>
</html>