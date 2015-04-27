<script>
$(function(){
	$('tr:not(:first)').one('click', tr_handler);

	function tr_handler(e) {
		e.preventDefault();

		$(this).on('click', function(e){
			e.preventDefault();
		});

		$.ajax({
			url: $('#tr_ajax').val(),
			type: 'get',
			data: {
				id_fecha: $(this).children().first().text()
			},
			success: function(data) {
				if(data.status == 'ok') {
					$('#content').html(data.content);
				}
			},
			complete: function() {
				$('tr:not(:first)').one('click', tr_handler);
			}
		});
	}
});
</script>

<p>Click en una fila para editar las fechas</p>

<table>
	<tr>
		<th>ID</th>
		<th>Fase</th>
		<th>Desde</th>
		<th>Hasta</th>
	</tr>
	@foreach($fechas as $fecha)
	<tr>
		<td>{{ $fecha->id }}</td>
		<td>{{ $fecha->fase }}</td>
		<td>{{ $fecha->desde ? $fecha->desde->format('d/m/Y H:i') : '' }}</td>
		<td>{{ $fecha->hasta ? $fecha->hasta->format('d/m/Y H:i') : '' }}</td>
	</tr>
	@endforeach
</table>

<div style="display: none;" id="aux">
	<input type="hidden" id="tr_ajax" value="{{ action('FechaController@editar') }}" />
</div>