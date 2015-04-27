<script>
    $(function(){
        $('.bxslider-grupos').bxSlider({
            preloadImages: 'all',
            infiniteLoop: true,
            onSliderLoad: function() {
                grupo = 'a';
            },
            onSlideAfter: function(slide) {
                grupo = slide.attr('grupo');
            }
        });

        $('input[name="radiog_lite"]').on('click', function(e){
            var partido = $(this).parent().attr('partido');
            $('#' + partido).val($(this).val());
        });

        $('#btn_guardar').one('click', btn_guardar);

        function btn_guardar(e) {
            e.preventDefault();

            $('#btn_guardar').on('click', function(e) {
                e.preventDefault();
            });

            $('#frm_grupos').ajaxSubmit({
                data: {
                    respuesta: $('#respuesta_grupos').val()
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
                    $('#btn_guardar').one('click', btn_guardar);
                    $('*').css('cursor', 'auto');
                }
            });
        }
    });
</script>

<div class="grupos">
    <div class="titulo"><p>GRUPOS</p></div>
    <a href="" class="borrar-todo">BORRAR TODO</a>
    @if(Fecha::where('hasta', '>=', Carbon::now())->where('fase', '=', 'grupos')->first())
    <a href="#" class="guardar" id="btn_guardar">GUARDAR</a>
    @endif
    <div class="slider-grupos">
        <ul class="bxslider-grupos">
            @foreach(Config::get('prode.grupos') as $grupo)
            <li grupo="{{ $grupo }}">
                <p class="grupo-letra">{{ strtoupper($grupo) }}</p>
                <div class="partidos">
                    @foreach(Partido::where('grupo', '=', $grupo)->get() as $partido)
                    <div class="fila">
                        <form partido="{{ $partido->id }}">
                            <?php
                            $pronostico = Pronostico::where('id_usuario', '=', Auth::user()->id)->where('id_partido', '=', $partido->id)->first();
                            $resultado = !is_null($pronostico) ? Helpers::resultado_pronostico($pronostico) : 'n';
                            ?>
                            <p class="equipo-a">{{ !is_null($partido->goles_a) ? '(' . $partido->goles_a . ')' : '' }} {{ $partido->equipo_a->nombre }}<img width='16' src="{{ url("flags/{$partido->equipo_a->id}.png") }}"/></p>
                            <!-- <div class="resultado-grupos-a mal"></div>
                            <div class="resultado-grupos-b bien"></div>
                            <div class="resultado-grupos-c mal"></div> -->
                            <?php $string = 'resultado-grupos-'; switch(Helpers::resultado_partido($partido)) {
                                    case 'a':
                                        $string .= 'a';
                                        break;
                                    case 'b':
                                        $string .= 'c';
                                        break;
                                    case 'e':
                                        $string .= 'b';
                                        break; ?>
                            <?php } ?>
                            @if(!is_null($pronostico))
                                @if(Helpers::resultado_partido($partido) == Helpers::resultado_pronostico($pronostico))
                                <?php $string .= ' bien'; ?>
                                @else
                                <?php $string .= ' mal'; ?>
                                @endif
                            @endif
                            <div class="{{ $string }}"></div>
                            <input type="radio" name="radiog_lite" id="radio1" class="checkbox-resultado" value="a" {{ $resultado == 'a' ? 'checked' : '' }} />
                            <input type="radio" name="radiog_lite" id="radio2" class="checkbox-resultado" value="e" {{ $resultado == 'e' ? 'checked' : '' }} />
                            <input type="radio" name="radiog_lite" id="radio3" class="checkbox" value="b" {{ $resultado == 'b' ? 'checked' : '' }} />
                            <p class="equipo-b">{{ $partido->equipo_b->nombre }} {{ !is_null($partido->goles_b) ? '(' . $partido->goles_b . ')' : '' }}<img width='16' src="{{ url("flags/{$partido->equipo_b->id}.png") }}"/></p>
                        </form>
                    </div>
                    @endforeach
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div style="display: none;">
        {{ Form::open(array(
            'action' => 'PronosticoController@guardar_fase',
            'id' => 'frm_grupos'
        )) }}

        <input type="hidden" name="fase" value="grupos" />
        <input type="hidden" name="ahora" value="{{ date('Y/m/d', time()) }}" />

        @foreach(Partido::where('fase', '=', 'grupos')->get() as $partido)
        <?php $pronostico = Pronostico::where('id_usuario', '=', Auth::user()->id)->where('id_partido', '=', $partido->id)->first(); ?>
        <input type="hidden" name="{{ 'p' . $partido->id }}" id="{{ $partido->id }}" value="{{ $pronostico ? Helpers::resultado_pronostico($pronostico) : '' }}" />
        @endforeach

        {{ Form::close() }}
    </div>
    <div class="bajada-grupos">
        <?php $hasta = Fecha::where('fase', '=', 'grupos')->first()->hasta; ?>
        <p>Completá tu pronóstico. Recordá que podés cambiar tus opciones hasta el {{ $hasta->format('d/m/Y') }} a las {{ $hasta->format('G:i') }}hs.</p>
    </div>
    <div class="pregunta-desempate">
        <p>PREGUNTA DESEMPATE</p>
        <p>¿Cuántas “tarjetas amarillas” habrá durante toda la fase grupos?</p>
            <label>TU RESPUESTA</label>
            <?php $pregunta = Pregunta::where('id_usuario', '=', Auth::user()->id)->where('fase', '=', 'grupos')->first(); ?>
            <input name="respuesta" type="text" id="respuesta_grupos" value="{{ $pregunta->respuesta or '' }}" />

            <input name="correcta" value="{{ Respuesta::where('fase', '=', 'grupos')->first()->respuesta != 0 ? Respuesta::where('fase', '=', 'grupos')->first()->respuesta : '--' }}" type="text"/>
            <label>RTA. CORRECTA</label>
    </div>
</div>