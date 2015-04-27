<html>
	<head>
		{{ HTML::script('js/jquery-1.11.0.min.js') }}
		<script>
		$(function(){
			$('a').on('click', function(e) {
				e.preventDefault();
				var boton = $(e.target);

				$.ajax({
					type: 'get',
					url: boton.attr('href'),
					success: function(data) {
						if(data.status == 'ok') {
							$('#usr' + data.id).find('.' + data.fase).text(data.dato).css('color', 'green');
						}
					},
					complete: function() {
						$('tr').eq(boton.parents('tr').index() + 1).children().eq(boton.parent('td').index()).children('a').trigger('click');
					}
				});
			});
		});
		</script>
	</head>
	<body>
		<table>
			<tr>
				<th>Usuario</th>
				<th>Grupos</th>
				{{-- <th>Octavos</th> --}}
				<th>Cuartos</th>
				<th>Semi</th>
				<th>Final</th>
				<th>Candidato</th>
				<th>Total</th>
			</tr>
			@foreach($usuarios as $usuario)
			<tr id="{{ 'usr' . $usuario->id }}">
				<td>{{ $usuario->email }}</td>
				<td><a class="grupos" href="{{ url('actualizarpuntos', array($usuario->id, 'grupos')) }}">{{ Helpers::puntos_fase('grupos', $usuario) }}</a></td>
				{{-- <td><a class="octavos" href="{{ url('actualizarpuntos', array($usuario->id, 'octavos')) }}">{{ $usuario->octavos }}</a></td> --}}
				<td><a class="cuartos" href="{{ url('actualizarpuntos', array($usuario->id, 'cuartos')) }}">{{ Helpers::puntos_fase('cuartos', $usuario) }}</a></td>
				<td><a class="semi" href="{{ url('actualizarpuntos', array($usuario->id, 'semi')) }}">{{ Helpers::puntos_fase('semi', $usuario) }}</a></td>
				<td><a class="final" href="{{ url('actualizarpuntos', array($usuario->id, 'final')) }}">{{ Helpers::puntos_fase('final', $usuario) }}</a></td>
				<td><a class="puntos_candidato" href="{{ url('actualizarpuntos', array($usuario->id, 'puntos_candidato')) }}">{{ Helpers::puntos_fase('puntos_candidato', $usuario) }}</a></td>
				<td><a class="total" href="{{ url('actualizarpuntos', $usuario->id) }}">{{ Helpers::puntos_fase('total', $usuario) }}</a></td>
			</tr>
			@endforeach
		</table>
	</body>
</html>