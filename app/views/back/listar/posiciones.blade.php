<script>
$(function(){
	$('.confirmar_posicion').on('click', function(e) {
		e.preventDefault();

		$.ajax({
			url: $(this).attr('ajax'),
			type: 'post',
			data: {
				id_posicion: $(this).attr('id_posicion'),
				id_usuario: $(this).parents('tr').find('select').val()
			},
			success: function(data) {
				$('#content').html(data.content);
			}
		});
	});

	$('.eliminar_posicion').on('click', function(e) {
		e.preventDefault();

		$.ajax({
			url: $(this).attr('ajax'),
			type: 'post',
			data: {
				id_posicion: $(this).attr('id_posicion')
			},
			success: function(data) {
				$('#content').html(data.content);
			}
		});
	});
});
</script>

<table>
	<tr>
		<th>Fase</th>
		<th>Posición</th>
		<th>Usuario</th>
		<th>Opciones</th>
	</tr>
	@foreach($posiciones as $posicion)
	<tr>
		<td>{{ $posicion->fase }}</td>
		<td>{{ $posicion->posicion }}</td>
		<td>
			@if($posicion->id_usuario)
			{{ Usuario::where('id', '=', $posicion->id_usuario)->first()->apodo }}
			@else
			<select>
				<option value="">---</option>
				@if($posicion->fase != 'final')
					@foreach(Helpers::ordenar_fase($posicion->fase) as $participante)
					<option value="{{ $participante->id }}">{{ $participante->apodo . ' (' . Helpers::puntos_fase($posicion->fase, $participante) . ')' }}</option>
					@endforeach()
				@else
					@foreach(Helpers::ordenar_participantes() as $participante)
					<option value="{{ $participante->id }}">{{ $participante->apodo . ' (' . Helpers::puntos($participante) . ')' }}</option>
					@endforeach()
				@endif
			</select>
			@endif
		</td>
		<td>
			<a class="confirmar_posicion" href="#" ajax="{{ action('PosicionController@guardar') }}" id_posicion="{{ $posicion->id }}">Confirmar</a>
			@if($posicion->id_usuario)
			|
			<a class="eliminar_posicion" href="#" ajax="{{ action('PosicionController@eliminar') }}" id_posicion="{{ $posicion->id }}">Eliminar</a>
			@endif
		</td>
	</tr>
	@endforeach
</table>

<div style="display: none;" id="aux">
	<input type="hidden" id="tr_ajax" value="{{ action('FechaController@editar') }}" />
</div>