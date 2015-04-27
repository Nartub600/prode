<script>
$(function(){
	$('.toggle_usuario').on('click', function(e){
		e.preventDefault();

		$.ajax({
			url: $(this).attr('ajax'),
			type: 'post',
			data: {
				id_usuario: $(this).parents('tr').attr('id_usuario')
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
		<th>ID</th>
		<th>Usuario</th>
		<th>Tipo</th>
		<th>Email</th>
		<th>Teléfono</th>
		<th>Localidad</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Apodo</th>
		<th>Foto</th>
		<th>Candidato</th>
		<th>Opciones</th>
	</tr>
	@foreach($usuarios as $usuario)
	<tr id_usuario="{{ $usuario->id }}" {{ $usuario->deleted_at ? 'style="background-color: lightcoral";' : '' }}>
		<td>{{ $usuario->id }}</td>
		<td>{{ $usuario->nick }}</td>
		<td>{{ Config::get("prode.grupos_de_usuario.{$usuario->grupo}") }}</td>
		<td>{{ $usuario->email }}</td>
		<td>{{ $usuario->telefono }}</td>
		<td>{{ $usuario->localidad }}</td>
		<td>{{ $usuario->nombre }}</td>
		<td>{{ $usuario->apellido }}</td>
		<td>{{ $usuario->apodo }}</td>
		<td>
			@if($usuario->foto)
			<img height="100" src="{{ asset("uploads/fotos/{$usuario->foto}") }}" />
			@endif
		</td>
		<td>{{ $usuario->candidato->nombre or '' }}</td>
		<td><a class="toggle_usuario" href="#" ajax="{{ action('UsuarioController@toggle') }}">{{ $usuario->deleted_at ? 'Activar' : 'Desactivar' }}</a></td>
	</tr>
	@endforeach
</table>