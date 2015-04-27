<div class="col-3">
    <div class="resumen-ganadores">
        <h1>RESUMEN GANADORES</h1>
        <?php

        $ahora = Carbon::now();
        $desde_grupos = Fecha::where('fase', '=', 'grupos')->first()->desde;
        $desde_octavos = Fecha::where('fase', '=', 'octavos')->first()->desde;
        $desde_cuartos = Fecha::where('fase', '=', 'cuartos')->first()->desde;
        $desde_semi = Fecha::where('fase', '=', 'semi')->first()->desde;
        $desde_final = Fecha::where('fase', '=', 'final')->first()->desde;

        ?>

        <div class="grupo-ganador">
            <h2>GRUPOS:</h2>
            <ul>
                @if($ahora->gt($desde_grupos) && count(Posicion::where('fase', '=', 'grupos')->where('id_usuario', '!=', '')->get()) > 0)
                    @foreach(Posicion::where('fase', '=', 'grupos')->where('id_usuario', '!=', '')->get() as $posicion)
                    <?php $participante = Usuario::find($posicion->id_usuario); ?>
                    <li>{{ $participante->apodo . ' (' . Helpers::puntos_fase('grupos', $participante) . ')' }}</li>
                    @endforeach
                @else
                <?php $i = 1; ?>
                @while($i <= 2)
                    <li>---</li>
                <?php $i++; ?>
                @endwhile
                @endif
            </ul>
        </div>

        <div class="grupo-ganador">
            <h2>OCTAVOS:</h2>
            <ul>
                @if($ahora->gt($desde_octavos) && Posicion::where('fase', '=', 'octavos')->where('id_usuario', '!=', '')->get())
                    @foreach(Posicion::where('fase', '=', 'octavos')->where('id_usuario', '!=', '')->get() as $posicion)
                    <?php $participante = Usuario::find($posicion->id_usuario); ?>
                    <li>{{ $participante->apodo . ' (' . Helpers::puntos_fase('grupos', $participante) . ')' }}</li>
                    @endforeach
                @else
                <?php $i = 1; ?>
                @while($i <= 2)
                    <li>---</li>
                <?php $i++; ?>
                @endwhile
                @endif
            </ul>
        </div>

        <div class="grupo-ganador">
            <h2>CUARTOS:</h2>
            <ul>
                @if($ahora->gt($desde_cuartos) && Posicion::where('fase', '=', 'cuartos')->where('id_usuario', '!=', '')->get())
                    @foreach(Posicion::where('fase', '=', 'cuartos')->where('id_usuario', '!=', '')->get() as $posicion)
                    <?php $participante = Usuario::find($posicion->id_usuario); ?>
                    <li>{{ $participante->apodo . ' (' . Helpers::puntos_fase('grupos', $participante) . ')' }}</li>
                    @endforeach
                @else
                <?php $i = 1; ?>
                @while($i <= 2)
                    <li>---</li>
                <?php $i++; ?>
                @endwhile
                @endif
            </ul>
        </div>

        <div class="grupo-ganador">
            <h2>SEMI FINAL:</h2>
            <ul>
                @if($ahora->gt($desde_semi) && Posicion::where('fase', '=', 'semi')->where('id_usuario', '!=', '')->get())
                    @foreach(Posicion::where('fase', '=', 'semi')->where('id_usuario', '!=', '')->get() as $posicion)
                    <?php $participante = Usuario::find($posicion->id_usuario); ?>
                    <li>{{ $participante->apodo . ' (' . Helpers::puntos_fase('grupos', $participante) . ')' }}</li>
                    @endforeach
                @else
                <?php $i = 1; ?>
                @while($i <= 2)
                    <li>---</li>
                <?php $i++; ?>
                @endwhile
                @endif
            </ul>
        </div>

        <div class="grupo-ganador final">
            <h2>¡GANADOR DE LA COPA!</h2>
            <?php $ganador = Posicion::where('fase', '=', 'final')->where('id_usuario', '!=', '')->first(); ?>
            @if($ganador)
            <p>{{ Usuario::find($ganador->id_usuario)->apodo . ' (' . Helpers::puntos(Usuario::find($ganador->id_usuario)) . ')' }}</p>
            @else
            <p>---</p>
            @endif
        </div>
    </div>
    <div class="resumen-posiciones">
        <h1>POSICIONES</h1>
        <?php $i = 1; ?>
        @foreach(Helpers::ordenar_participantes() as $participantex)
        <div class="posicion">
            @if($participantex->foto)
            <img class="upload-img" src="{{ asset('uploads/fotos/' . $participantex->foto) }}"/>
            @else
            <img class="user-img" src="{{ url('img/messi.jpg') }}"/>
            @endif
            <p class="nombre">{{ $participantex->apodo }}</p>
            <p class="puntos">{{ Helpers::puntos($participantex) }}</p>
        </div>
        @if($i == 5)
        <?php break; ?>
        @endif
        <?php $i++; ?>
        @endforeach
        <div class='vermas-posiciones'>
            <a href="tabla-general/">Ver más</a>
        </div>
    </div>
</div>