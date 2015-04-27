<script>
$(function(){
	$('#texto').ckeditor({
		toolbar: 'Basic',
		width: '640px'
	});
});
</script>

{{ Form::open(array(
	'action' => 'NovedadController@guardar'
)) }}

<input type="hidden" name="id_novedad" value="{{ $novedad->id }}" />

<p>
	<label for="titulo">Título:</label>
	<input type="text" name="titulo" value="{{ $novedad->titulo }}" />
</p>

<p>
	<label for="texto">Texto:</label>
	<textarea name="texto" id="texto">{{ $novedad->texto }}</textarea>
</p>

<a guardar href="#">Guardar</a>

{{ Form::close() }}