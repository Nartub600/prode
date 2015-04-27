<script>
$(function(){
	$('tr:not(:first)').one('click', tr_handler);

	function tr_handler(e) {
		e.preventDefault();
		e.stopImmediatePropagation();

		$(this).on('click', function(e){
			e.preventDefault();
		});

		$.ajax({
			url: $('#tr_ajax').val(),
			type: 'post',
			beforeSend: function() {
				if(confirm('Confirme para eliminar el mensaje')) {
					return true;
				} else {
					$('tr:not(:first)').one('click', tr_handler);
					return false;
				}
			},
			data: {
				id_mensaje: $(this).attr('id_mensaje')
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

<p>Click en un mensaje para eliminarlo</p>

<table>
	<tr>
		<th>Usuario</th>
		<th>Mensaje</th>
	</tr>
	@foreach($mensajes as $mensaje)
	@if($mensaje->usuario)
		<tr id_mensaje="{{ $mensaje->id }}">
			<td>{{ $mensaje->usuario->email . ' (' . $mensaje->usuario->apodo . ')' }}</td>
			<td>{{ $mensaje->texto }}</td>
		</tr>
	@endif
	@endforeach
</table>

<div style="display: none;" id="aux">
	<input type="hidden" id="tr_ajax" value="{{ action('MensajeController@eliminar') }}" />
</div>