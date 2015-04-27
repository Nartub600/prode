<!DOCTYPE html>
<html>
    <head>
         <!--[if lt IE 9]>
        <script type="text/javascript">
           document.createElement("nav");
           document.createElement("header");
           document.createElement("footer");
           document.createElement("section");
           document.createElement("article");
           document.createElement("aside");
           document.createElement("hgroup");
        </script>
        <![endif]-->
         <!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Copa Media Naranja</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700' rel='stylesheet' type='text/css'>

        <link href="css/fonts.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/prode-theme-01.css" rel="stylesheet" type="text/css" media="screen" />




        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <!-- bxSlider Javascript file -->
        <script src="js/jquery.bxslider.min.js"></script>
        <!-- bxSlider CSS file -->
        <link href="css/jquery.bxslider.css" rel="stylesheet" />


        <script type="text/javascript" src="js/prettify/prettify.js"></script>
        <script type="text/javascript" src="js/jquery.slimscroll.js"></script>

        {{ HTML::script('js/jquery.form.min.js') }}
        {{ HTML::script('js/jquery.noty.packaged.min.js') }}
    </head>
    <body>
        <!-- HEADER -->
        @include('front/header')
        <!--  FIN HEADER -->
        <section>
            <div class="content-01">
                <div class="content-fixture">
                    <div class="col-1">
                        @include('front/columna-01')
                    </div>
                    <div class="col-4">
                        <div class="tabla-posiciones">
                            <div class="titular">
                                <h1>TABLA GENERAL</h1>
                            </div>
                            <div class="fila">
                                <div class="row-1 primera" style="padding-left: 0; width: 200px;">
                                    <p style="text-align: center !important;">USUARIO</p>
                                </div>
                                <div class="row-1">
                                    <p>TOTAL<br/>PUNTOS</p>
                                </div>
                                <div class="row-1">
                                    <p>FASE<br/>GRUPOS</p>
                                </div>
                                <div class="row-1">
                                    <p>FASE<br/>OCTAVOS</p>
                                </div>
                                <div class="row-1">
                                    <p>FASE<br/>CUARTOS</p>
                                </div>
                                <div class="row-1">
                                    <p>SEMI<br/>FINAL</p>
                                </div>
                                <div class="row-1">
                                    <p>FINAL</p>
                                </div>
                                <div class="row-1 candidato">
                                    <p>CANDIDATO</p>
                                </div>
                                <div class="row-1 medallas">
                                    <p>MEDALLAS</p>
                                </div>
                            </div>

                            <div class="content-filas">
                                @foreach(Helpers::ordenar_participantes() as $participante)
                                <div class="fila">
                                    <div class="row-1 primera">
                                        @if($participante->foto)
                                        <img class="user-pos" src="{{ url('uploads/fotos/' . $participante->foto) }}"/>
                                        @else
                                        <img class="user-img" src="{{ url('img/messi.jpg') }}"/>
                                        @endif
                                        <p>{{ $participante->nombre . ' ' . $participante->apellido . ' (' . $participante->apodo . ')' }}</p>
                                    </div>
                                    <div class="row-1">
                                        <p>{{ Helpers::puntos($participante); }}</p>
                                    </div>
                                    <div class="row-1">
                                        <p>{{ Helpers::puntos_fase('grupos', $participante) }}</p>
                                    </div>
                                    <div class="row-1">
                                        <p>{{ Helpers::puntos_fase('octavos', $participante) }}</p>
                                    </div>
                                    <div class="row-1">
                                        <p>{{ Helpers::puntos_fase('cuartos', $participante) }}</p>
                                    </div>
                                    <div class="row-1">
                                        <p>{{ Helpers::puntos_fase('semi', $participante) }}</p>
                                    </div>
                                    <div class="row-1">
                                        <p>{{ Helpers::puntos_fase('final', $participante) }}</p>
                                    </div>
                                    <div class="row-1 candidato">
                                        <p>{{ $participante->candidato->nombre }}</p>
                                    </div>
                                    <div class="row-1 medallas">
                                        <div class="medalla-pos">
                                            @foreach(Config::get('prode.fases') as $fase)
                                            <?php switch(Helpers::posicion_fase($participante, $fase)) {
                                                case 1: ?>
                                                    <img src="img/medalla-oro.png"/>
                                                    <?php break;
                                                case 2: ?>
                                                    <img src="img/medalla-plata.png"/>
                                                    <?php break;
                                            } ?>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
            @include('front/footer');
        <!-- FIN FOOTER -->


    </body>
</html>
<script>
    $(document).ready(function(){
        $('.bxslider-grupos').bxSlider({
            preloadImages: 'all'
        });

    });

</script>
<script>
    $(document).ready(function() {
        $('.content-filas').slimScroll({
            width: '710px',
            height:'810px',
            alwaysVisible: true,
            railVisible: true,
            allowPageScroll: true
        });
        $('.content-mensajes').slimScroll({
            width: '275px',
            height:'290px',
            start: $('.content-mensajes'),
            alwaysVisible: true,
            railVisible: true,
            allowPageScroll: true
        });
        $('.slimScrollDiv').css('float', 'left');
        $('.mensajes .slimScrollDiv').css('top', '90px');
        $('.mensajes .slimScrollDiv').css('left', '10px');
    });
</script>