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
				id_respuesta: $(this).children().first().text()
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

<p>Click en una fila para editar las respuestas</p>

<table>
	<tr>
		<th>ID</th>
		<th>Fase</th>
		<th>Respuesta</th>
	</tr>
	@foreach($respuestas as $respuesta)
	<tr>
		<td>{{ $respuesta->id }}</td>
		<td>{{ $respuesta->fase }}</td>
		<td>{{ $respuesta->respuesta ? $respuesta->respuesta : '' }}</td>
	</tr>
	@endforeach
</table>

<div style="display: none;" id="aux">
	<input type="hidden" id="tr_ajax" value="{{ action('RespuestaController@editar') }}" />
</div>