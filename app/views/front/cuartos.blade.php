<script>
$(function(){
    $('#btn_guardar_cuartos').one('click', btn_guardar_cuartos_handler);

    function btn_guardar_cuartos_handler(e) {
        e.preventDefault();

        $('#btn_guardar_cuartos').on('click', function(e) {
            e.preventDefault();
        });

        $('#frm_cuartos').ajaxSubmit({
            data: {
                respuesta: $('#respuesta_cuartos').val()
            },
            beforeSerialize: function() {
                $('.octavos form[partido]').each(function(i,e) {
                    $('#frm_cuartos').find('#a' + $(e).attr('partido')).val($(e).find('[name="goles_a"]').val())
                    $('#frm_cuartos').find('#b' + $(e).attr('partido')).val($(e).find('[name="goles_b"]').val())
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
                $('#btn_guardar_cuartos').one('click', btn_guardar_cuartos_handler);
                $('*').css('cursor', 'auto');
            }
        });
    }
});
</script>

<div class="grupos cuartos">
    <div class="titulo"><p>CUARTOS</p></div>
    <a href="" class="borrar-todo">BORRAR TODO</a>
    @if(Fecha::where('hasta', '>=', Carbon::now())->where('fase', '=', 'cuartos')->first())
    <a id="btn_guardar_cuartos" href="#" class="guardar">GUARDAR</a>
    @endif
    <div class="partidos cuartos">
        @foreach(Partido::where('fase', '=', 'cuartos')->get() as $partido)
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
            'id' => 'frm_cuartos'
        )) }}

        <input type="hidden" name="fase" value="cuartos" />
        <input type="hidden" name="ahora" value="{{ date('Y/m/d', time()) }}" />

        @foreach(Partido::where('fase', '=', 'cuartos')->get() as $partido)
        <?php $pronostico = Pronostico::where('id_usuario', '=', Auth::user()->id)->where('id_partido', '=', $partido->id)->first(); ?>
        <input type="hidden" name="a{{ $partido->id }}" id="a{{ $partido->id }}" value="{{ $pronostico ? $pronostico->goles_a : '' }}" />
        <input type="hidden" name="b{{ $partido->id }}" id="b{{ $partido->id }}" value="{{ $pronostico ? $pronostico->goles_b : '' }}" />
        @endforeach

        {{ Form::close() }}
    </div>
    <div class="bajada-grupos">
        <?php $hasta = Fecha::where('fase', '=', 'cuartos')->first()->hasta; ?>
        <p>Completá tu pronóstico. Recordá que podés cambiar tus opciones hasta el {{ $hasta->format('d/m/Y') }} a las {{ $hasta->format('G:i') }}hs.</p>
    </div>
    <div class="pregunta-desempate">
        <p>PREGUNTA DESEMPATE</p>
        <p>¿Cuántos “tiros de esquina” habrá en toda la fase cuartos?</p>
        <form>
            <label>TU RESPUESTA</label>
            <?php $pregunta = Pregunta::where('id_usuario', '=', Auth::user()->id)->where('fase', '=', 'cuartos')->first(); ?>
            <input id="respuesta_cuartos" name="tu-respuesta" type="text" value="{{ $pregunta->respuesta or '' }}" />

            <input name="correcta" value="{{ Respuesta::where('fase', '=', 'cuartos')->first()->respuesta != 0 ? Respuesta::where('fase', '=', 'cuartos')->first()->respuesta : '--' }}" type="text"/>
            <label>RTA. CORRECTA</label>
        </form>
    </div>
</div>