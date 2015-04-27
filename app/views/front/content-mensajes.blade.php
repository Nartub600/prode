@foreach(Mensaje::orderBy('created_at', 'desc')->get() as $mensaje)
@if($mensaje->usuario)
<div class="content-mensaje">
    <p class="titulo">{{ $mensaje->usuario->apodo }}:</p>
    <p class="mensaje">{{ $mensaje->texto }}</p>
</div>
@endif
@endforeach