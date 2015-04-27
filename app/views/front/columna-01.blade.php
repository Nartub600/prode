<script>
$(function(){
    $('#mensaje_texto').on('keypress', function(e) {
        if(e.which == 13) {
            e.preventDefault();
            $(this).parent('form').ajaxSubmit({
                beforeSubmit: function() {
                    $('#mensaje_texto').prop('disabled', true);
                    $('*').css('cursor', 'wait');
                },
                success: function(data) {
                    if(data.status == 'ok') {
                        $('#mensaje_texto').val('');
                        // $('.content-mensajes').fadeOut(400, function(){
                            $('.content-mensajes').html(data.html);
                            // $('.content-mensajes').fadeIn();
                        // });
                    } else {
                        _.each(data.validator, function(value, key, list){
                            noty({
                                text: value,
                                type: 'warning',
                                timeout: 3000,
                                layout: 'topRight',
                                maxVisible: 10
                            });
                        });
                    }
                },
                complete: function() {
                    $('#mensaje_texto').prop('disabled', false);
                    $('*').css('cursor', 'auto');
                }
            });
        }
    });

    $('.content-mensajes').slimScroll({
        width: '275px',
        height:'290px',
        start: $('.content-mensajes'),
        alwaysVisible: true,
        railVisible: true,
        allowPageScroll: true
    });

    // $('.content-mensajes').parents('.slimScrollDiv').css('background', 'white');
    $('.slimScrollDiv').css('float', 'left');
    $('.mensajes .slimScrollDiv').css('top', '90px');
    $('.mensajes .slimScrollDiv').css('left', '10px');
});
</script>

<div class="col-1">
    <div class="descripcion-usuario">
        <p class="titulo">¡Hola {{ Auth::user()->nick }}!</p>
        <p class="apodo">{{ Auth::user()->apodo }}</p>
        @if(!Auth::user()->isAdmin())
        <img class="upload-img" src="{{ url('uploads/fotos/' . Auth::user()->foto) }}"/>
        @endif
    </div>

    <!-- <div class="tus-puntos">
        <p class="titulo">Tus puntos</p>
        <div class="totales">
            <p class="titulo">TOTALES</p>
            <p class="puntos">0</p>
        </div>
        @if(!Auth::user()->isAdmin())
        <p class="candidato">Candidato:<br/>{{ strtoupper(Auth::user()->candidato->nombre) }}</p>
        @endif
        <div class="puntos-detalle">
            <p>GRUPOS <span>0</span></p>
            <p>OCTAVOS <span>0</span></p>
            <p>CUARTOS <span>0</span></p>
            <p>SEMI FINAL <span>0</span></p>
            <p>FINAL <span>0</span></p>
        </div>
        <p class="posicion">Posición: 0</p>
    </div> -->

    <div class="tus-puntos">
        <p class="titulo">Tus puntos</p>
        <div class="totales">
            <p class="titulo">TOTALES</p>
            <p class="puntos">{{ Helpers::puntos(Auth::user()) }}</p>
        </div>
        @if(!Auth::user()->isAdmin())
        <p class="candidato">Candidato:<br/>{{ strtoupper(Auth::user()->candidato->nombre) }}</p>
        @endif
        <div class="puntos-detalle">
            <p>GRUPOS <span>{{ Helpers::puntos_fase('grupos', Auth::user()) }}</span></p>
            {{-- <p>OCTAVOS <span>{{ Helpers::puntos_fase('octavos', Auth::user()) }}</span></p> --}}
            <p>CUARTOS <span>{{ Helpers::puntos_fase('cuartos', Auth::user()) }}</span></p>
            <p>SEMI FINAL <span>{{ Helpers::puntos_fase('semi', Auth::user()) }}</span></p>
            <p>FINAL <span>{{ Helpers::puntos_fase('final', Auth::user()) }}</span></p>
        </div>
        <p class="posicion">Posición: {{-- Helpers::posicion(Auth::user()) --}}</p>
    </div>

    <div class="mensajes">
        <p class="titulo">Mensajes</p>
        @if(Auth::user()->foto)
        <img class="user-img" src="{{ url('uploads/fotos/' . Auth::user()->foto) }}"/>
        @else
        <img class="user-img" src="{{ url('img/messi.jpg') }}"/>
        @endif
        {{ Form::open(array(
            'action' => 'MensajeController@guardar'
        )) }}
        <textarea name="texto" id="mensaje_texto"></textarea>
        {{ Form::close() }}
        <div class="content-mensajes">
            @foreach(Mensaje::orderBy('created_at', 'desc')->get() as $mensaje)
            @if($mensaje->usuario)
                <div class="content-mensaje">
                    <p class="titulo">{{ $mensaje->usuario->apodo }}:</p>
                    <p class="mensaje">{{ $mensaje->texto }}</p>
                </div>
            @endif
            @endforeach
        </div>
    </div>
</div>