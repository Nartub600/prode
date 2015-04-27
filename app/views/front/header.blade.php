<header>
    <div class="content-01">
        <div class="content-menu">
            <img class="logo-02" src="{{ asset('img/logo-02.png') }}"/>
            <ul class="menu-superior">
                <li><a href="{{ url('mi-perfil') }}">Mi perfil</a></li>
                <li><a href="{{ url('fixture') }}">Mi pronóstico</a></li>
                <li><a href="{{ url('tabla-general') }}">Tabla general</a></li>
                <li><a href="{{ url('premios') }}">Premios</a></li>
                <li><a href="{{ url('novedades') }}">Novedades</a></li>
                <li><a href="{{ url('extras') }}">Extras</a></li>
            </ul>
            <a href="{{ url('logout') }}" class="salir">Salir</a>
        </div>
    </div>
</header>