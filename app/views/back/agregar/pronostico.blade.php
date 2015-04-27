<script>
$(function(){
	$('#id_partido').on('change', function(){
		var selected = $('#id_partido option:selected');

		$('#goles_a').siblings('label').text('Goles ' + selected.attr('equipo_a') + ':');
		$('#goles_b').siblings('label').text('Goles ' + selected.attr('equipo_b') + ':');

		if(selected.val() != '') { $('#goles').show(); } else { $('#goles').hide(); }
	});
});
</script>

{{ Form::open(array(
	'action' => 'PronosticoController@guardar'
)) }}

<p>
	<label for="id_partido">Partido:</label>
	<select name="id_partido" id="id_partido">
		<option value="">---</option>
		@foreach($partidos as $partido)
		<option value="{{ $partido->id }}" equipo_a="{{ $partido->equipo_a->nombre }}" equipo_b="{{ $partido->equipo_b->nombre }}">
			{{ $partido->equipo_a->nombre }} - {{ $partido->equipo_b->nombre }} ({{ $partido->equipo_a->grupo }})
		</option>
		@endforeach
	</select>
</p>

<div style="display: none;" id="goles">
	<p>
		<label for="goles_a">Goles:</label>
		<input type="text" name="goles_a" id="goles_a" />
	</p>

	<p>
		<label for="goles_b">Goles:</label>
		<input type="text" name="goles_b" id="goles_b" />
	</p>
</div>

<a guardar href="#">Guardar</a>

{{ Form::close() }}