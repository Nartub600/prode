<script>
$(function(){
    $('#btn_guardar_octavos').one('click', btn_guardar_octavos_handler);

    function btn_guardar_octavos_handler(e) {
        e.preventDefault();

        $('#btn_guardar_octavos').on('click', function(e) {
            e.preventDefault();
        });

        $('#frm_octavos').ajaxSubmit({
            data: {
                respuesta: $('#respuesta_octavos').val()
            },
            beforeSerialize: function() {
                $('.octavos form[partido]').each(function(i,e) {
                    $('#frm_octavos').find('#a' + $(e).attr('partido')).val($(e).find('[name="goles_a"]').val())
                    $('#frm_octavos').find('#b' + $(e).attr('partido')).val($(e).find('[name="goles_b"]').val())
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
                $('#btn_guardar_octavos').one('click', btn_guardar_octavos_handler);
                $('*').css('cursor', 'auto');
            }
        });
    }
});
</script>

<div class="grupos octavos">
    <div class="titulo"><p>OCTAVOS</p></div>
    <a href="" class="borrar-todo">BORRAR TODO</a>
    @if(Fecha::where('hasta', '>=', Carbon::now())->where('fase', '=', 'octavos')->first())
    <a id="btn_guardar_octavos" href="#" class="guardar">GUARDAR</a>
    @endif
    <div class="partidos octavos">
        @foreach(Partido::where('fase', '=', 'octavos')->get() as $partido)
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
        @endforeach
        {{ Form::open(array(
            'action' => 'PronosticoController@guardar_fase',
            'id' => 'frm_octavos'
        )) }}

        <input type="hidden" name="fase" value="octavos" />
        <input type="hidden" name="ahora" value="{{ date('Y/m/d', time()) }}" />

        @foreach(Partido::where('fase', '=', 'octavos')->get() as $partido)
        <?php $pronostico = Pronostico::where('id_usuario', '=', Auth::user()->id)->where('id_partido', '=', $partido->id)->first(); ?>
        <input type="hidden" name="a{{ $partido->id }}" id="a{{ $partido->id }}" value="{{ $pronostico ? $pronostico->goles_a : '' }}" />
        <input type="hidden" name="b{{ $partido->id }}" id="b{{ $partido->id }}" value="{{ $pronostico ? $pronostico->goles_b : '' }}" />
        @endforeach

        {{ Form::close() }}
    </div>
    <div class="bajada-grupos">
        <?php $hasta = Fecha::where('fase', '=', 'octavos')->first()->hasta; ?>
        <p>Completá tu pronóstico. Recordá que podés cambiar tus opciones hasta el {{ $hasta->format('d/m/Y') }} a las {{ $hasta->format('G:i') }}hs.</p>
    </div>
    <div class="pregunta-desempate">
        <p>PREGUNTA DESEMPATE</p>
        <p>¿Cuántos “goles” se realizarán durante toda la fase octavos? (sin contar la definición por penales)</p>
        <form>
            <label>TU RESPUESTA</label>
            <?php $pregunta = Pregunta::where('id_usuario', '=', Auth::user()->id)->where('fase', '=', 'octavos')->first(); ?>
            <input id="respuesta_octavos" name="tu-respuesta" type="text" value="{{ $pregunta->respuesta or '' }}" />

            <input name="correcta" value="{{ Respuesta::where('fase', '=', 'octavos')->first()->respuesta != 0 ? Respuesta::where('fase', '=', 'octavos')->first()->respuesta : '--' }}" type="text"/>
            <label>RTA. CORRECTA</label>
        </form>
    </div>
</div>