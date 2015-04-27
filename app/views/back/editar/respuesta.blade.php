{{ Form::open(array(
	'action' => 'RespuestaController@guardar'
)) }}

<input type="hidden" name="id_respuesta" value="{{ $respuesta->id }}" />

<p>
	<label for="fase">Fase:</label>
	<input type="text" name="fase" value="{{ $respuesta->fase }}" readonly />
</p>

<p>
	<label for="respuesta">Respuesta:</label>
	<input type="text" name="respuesta" value="{{ $respuesta->respuesta }}" />
</p>

<a guardar href="#">Guardar</a>

{{ Form::close() }}