<script>
$(function(){
	$('.editar_novedad').one('click', tr_handler);

	function tr_handler(e) {
		e.preventDefault();

		$(this).on('click', function(e){
			e.preventDefault();
		});

		$.ajax({
			url: $(this).attr('ajax'),
			type: 'get',
			data: {
				id_novedad: $(this).parents('tr').attr('id_novedad')
			},
			success: function(data) {
				if(data.status == 'ok') {
					$('#content').html(data.content);
				}
			},
			complete: function() {
				$('.editar_novedad').one('click', tr_handler);
			}
		});
	}

		$('.toggle_novedad').on('click', function(e){
			e.preventDefault();

			$.ajax({
				url: $(this).attr('ajax'),
				type: 'post',
				data: {
					id_novedad: $(this).parents('tr').attr('id_novedad')
				},
				success: function(data) {
					$('#content').html(data.content);
				}
			});
		});
});
</script>

<p>
	<a href="{{ action('NovedadController@agregar') }}" content>Nueva Novedad</a>
</p>

<table>
	<tr>
		<th>ID</th>
		<th>Título</th>
		<th>Texto</th>
		<th>Opciones</th>
	</tr>
	@foreach($novedades as $novedad)
	<tr id_novedad="{{ $novedad->id }}">
		<td>{{ $novedad->id }}</td>
		<td>{{ $novedad->titulo }}</td>
		<td>{{ $novedad->texto }}</td>
		<td>
			<a class="editar_novedad" href="#" ajax="{{ action('NovedadController@editar') }}">Editar</a>
			|
			<a class="toggle_novedad" href="#" ajax="{{ action('NovedadController@toggle') }}">{{ $novedad->deleted_at ? 'Mostrar' : 'Ocultar' }}</a>
		</td>
	</tr>
	@endforeach
</table>