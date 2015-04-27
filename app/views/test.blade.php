<div class="tus-puntos">
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
</div>