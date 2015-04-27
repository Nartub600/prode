<script>
$(function(){
	$('#btn_logout').on('click', function(e){
		e.preventDefault();

		$.ajax({
			url: $(this).attr('href'),
			success: function() {
				location.reload();
			}
		});
	});
});
</script>

<a content href="{{ action('EquipoController@listar') }}">Equipos</a>
{{-- <a content href="{{ action('EquipoController@agregar') }}">Nuevo equipo</a> --}}
<a content href="{{ action('PartidoController@listar') }}">Partidos</a>
{{-- <a content href="{{ action('PartidoController@agregar') }}">Nuevo partido</a> --}}
<a content href="{{ action('FechaController@listar') }}">Fechas</a>
<a content href="{{ action('RespuestaController@listar') }}">Preguntas desempate</a>
<!-- <a content href="{{ action('GrupoController@listar') }}">Grupos</a> -->
<!-- <a content href="{{ action('PronosticoController@listar') }}">Pronósticos</a> -->
<!-- <a content href="{{ action('PronosticoController@agregar') }}">Nuevo pronóstico</a> -->
<a content href="{{ action('UsuarioController@listar') }}">Usuarios</a>
<a content href="{{ action('UsuarioController@agregar') }}">Nuevo usuario</a>
<a target="_blank" href="{{ url('back/actualizarpuntos') }}">Puntajes</a>
<a content href="{{ action('NovedadController@listar') }}">Novedades</a>
<a content href="{{ action('MensajeController@listar') }}">Mensajes</a>
<a id="btn_logout" href="{{ route('logout') }}">Logout</a>