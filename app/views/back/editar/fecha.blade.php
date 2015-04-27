<script>
$(function(){
	$('.datepicker').datepicker({
		dateFormat: 'dd/mm/yy',
		prevText: '<',
		nextText: '>',
		monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
	});

	$('.timepicker').timepicker({
		timeOnlyTitle: 'Elegir horario',
		timeText: 'Horario',
		hourText: 'Hora',
		minuteText: 'Minutos',
		currentText: 'Ahora',
		closeText: 'Listo'
	});
});
</script>

{{ Form::open(array(
	'action' => 'FechaController@guardar'
)) }}

<input type="hidden" name="id" value="{{ $fecha->id }}" />

<p>
	<label for="fase">Fase</label>
	<select name="fase" disabled>
		<option value="">---</option>
		@foreach(Config::get('prode.fases') as $fase)
		<option value="{{ $fase }}" {{ $fecha->fase == $fase ? 'selected' : '' }}>{{ $fase }}</option>
		@endforeach
	</select>
</p>

<p>
	<label for="desde">Desde:</label>
	<input type="text" name="desde" value="{{ $fecha->desde ? $fecha->desde->format('d/m/Y') : '' }}" class="datepicker" />
	<input type="text" name="hora_desde" value="{{ $fecha->desde ? $fecha->desde->format('H:i') : '' }}" class="timepicker" />
</p>

<p>
	<label for="hasta">Hasta:</label>
	<input type="text" name="hasta" value="{{ $fecha->hasta ? $fecha->hasta->format('d/m/Y') : '' }}" class="datepicker" />
	<input type="text" name="hora_hasta" value="{{ $fecha->hasta ? $fecha->hasta->format('H:i') : '' }}" class="timepicker" />
</p>

<a guardar href="#">Guardar</a>

{{ Form::close() }}