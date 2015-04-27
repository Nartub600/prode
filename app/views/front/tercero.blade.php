<script>
$(function(){
    $('#btn_guardar_tercero').one('click', btn_guardar_tercero_handler);

    function btn_guardar_tercero_handler(e) {
        e.preventDefault();

        $('#btn_guardar_tercero').on('click', function(e) {
            e.preventDefault();
        });

        $('#frm_tercero').ajaxSubmit({
            data: {
                respuesta: 1000
            },
            beforeSerialize: function() {
                $('.octavos form[partido]').each(function(i,e) {
                    $('#frm_tercero').find('#a' + $(e).attr('partido')).val($(e).find('[name="goles_a"]').val())
                    $('#frm_tercero').find('#b' + $(e).attr('partido')).val($(e).find('[name="goles_b"]').val())
                });
            },
            beforeSubmit: function() {
                $('*').css('cursor', 'wait');
            },
            success: function(data) {
                if(data.status == 'ok') {
                    noty({
                        text: 'Pronósticos guardados correctamente',
                        type: 'success',
                        timeout: 1000,
                        layout: 'topRight',
                        callback: {
                            afterClose: function() {
                                location.reload();
                            }
                        }
                    });
                } else {
                    if(data.validator) {
                        _.each(data.validator, function(value){
                            noty({
                                text: value,
                                type: 'warning',
                                timeout: 3000,
                                layout: 'topRight',
                                maxVisible: 10
                            });
                        });
                    }
                }
            },
            complete: function() {
                $('#btn_guardar_tercero').one('click', btn_guardar_tercero_handler);
                $('*').css('cursor', 'auto');
            }
        });
    }
});
</script>

<div class="grupos finales">
    <div class="titulo"><p>3er Y 4to PUESTO</p></div>
    <a href="" class="borrar-todo">BORRAR TODO</a>
    <a id="btn_guardar_tercero" href="#" class="guardar">GUARDAR</a>
    <div class="partidos finales">
        <?php $partido = Partido::where('fase', '=', 'tercero')->first(); ?>
        <?php $pronostico = Pronostico::where('id_usuario', '=', Auth::user()->id)->where('id_partido', '=', $partido->id)->first(); ?>
        <div class="fila octavos">
            <form partido="{{ $partido->id }}">
                <p class="equipo-a">{{ $partido->equipo_a->nombre }}
                    @if($partido->equipo_a->id <= 32)
                    <img src="{{ url("flags/{$partido->equipo_a->id}.png") }}"/>
                    @endif
                </p>
                <input class="input-resultado" type="text" name="goles_a" value="{{ $pronostico ? $pronostico->goles_a : '' }}" />
                <div class="resultado-terminado"><p>{{ $partido->goles_a or '-' }}|{{ $partido->goles_b or '-' }}</p></div>
                <input class="input-resultado" type="text" name="goles_b" value="{{ $pronostico ? $pronostico->goles_b : '' }}" />
                <p class="equipo-b">{{ $partido->equipo_b->nombre }}
                    @if($partido->equipo_b->id <= 32)
                    <img src="{{ url("flags/{$partido->equipo_b->id}.png") }}"/>
                    @endif
                </p>
            </form>
        </div>
        {{ Form::open(array(
            'action' => 'PronosticoController@guardar_fase',
            'id' => 'frm_tercero'
        )) }}

        <input type="hidden" name="fase" value="tercero" />
        <input type="hidden" name="ahora" value="{{ date('Y/m/d', time()) }}" />

        <?php $pronostico = Pronostico::where('id_usuario', '=', Auth::user()->id)->where('id_partido', '=', $partido->id)->first(); ?>
        <input type="hidden" name="a{{ $partido->id }}" id="a{{ $partido->id }}" value="{{ $pronostico ? $pronostico->goles_a : '' }}" />
        <input type="hidden" name="b{{ $partido->id }}" id="b{{ $partido->id }}" value="{{ $pronostico ? $pronostico->goles_b : '' }}" />

        {{ Form::close() }}
    </div>
    <div class="bajada-grupos">
        <p>Completá tu pronóstico. Recordá que podés cambiar tus opciones hasta el 22/2/22 a las 23:59hs.</p>
    </div>

</div>