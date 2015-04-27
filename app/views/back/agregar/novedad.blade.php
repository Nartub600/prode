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

<p>
	<label for="titulo">Título:</label>
	<input type="text" name="titulo" />
</p>

<p>
	<label for="texto">Texto:</label>
	<textarea name="texto" id="texto"></textarea>
</p>

<a guardar href="#">Guardar</a>

{{ Form::close() }}