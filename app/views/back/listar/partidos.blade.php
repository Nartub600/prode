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
				id_partido: $(this).children().first().text()
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

<p>Click en una fila para cargar el resultado</p>

<table>
	<tr>
		<th>ID</th>
		<th>Equipo A</th>
		<th>Equipo B</th>
		<th>Fase</th>
		<th>Grupo</th>
		<th>Goles A</th>
		<th>Goles B</th>
		<th>Fecha</th>
	</tr>
	@foreach($partidos as $partido)
	<tr>
		<td>{{ $partido->id }}</td>
		<td>{{ $partido->equipo_a->nombre }}</td>
		<td>{{ $partido->equipo_b->nombre }}</td>
		<td>{{ $partido->fase }}</td>
		<td>{{ $partido->grupo }}</td>
		<td>{{ $partido->goles_a }}</td>
		<td>{{ $partido->goles_b }}</td>
		<td>{{ $partido->fecha->format('d/m/Y H:i:s') }}</td>
	</tr>
	@endforeach
</table>

<div style="display: none;" id="aux">
	<input type="hidden" id="tr_ajax" value="{{ action('PartidoController@editar') }}" />
</div>