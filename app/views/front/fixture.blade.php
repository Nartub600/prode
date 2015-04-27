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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Copa Media Naranja</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css" media="screen" />

        <!--
        <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700' rel='stylesheet' type='text/css'>
        -->
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
        {{ HTML::script('js/underscore-min.js') }}
        {{ HTML::script('js/jquery.noty.packaged.min.js') }}
        <script>
            $(document).ready(function() {
                $('.col-2').slimScroll({
                    width: '490px',
                    height:'902px',
                    alwaysVisible: true,
                    railVisible: true,
                    allowPageScroll: true
                });
                $('.slimScrollDiv').css('float', 'left');
            });
        </script>
    </head>
    <body>
        @include('front/header')
        <section>
            <div class="content-01">
                <div class="content-fixture">
                    <div class="col-1">
                        @include('front/columna-01')
                    </div>
                    <div class="col-2">
                        <?php
                        $ahora = Carbon::now();
                        $fase_actual = Fecha::where('desde', '<=', $ahora)->orderBy('desde', 'desc')->first()->fase;
                        $fases_restantes = array_reverse(Config::get('prode.fases'));
                        if(($key = array_search($fase_actual, $fases_restantes)) !== false) {
                            unset($fases_restantes[$key]);
                        }
                        ?>
                        @include("front/$fase_actual")
                        @foreach($fases_restantes as $fase)
                            @if(Fecha::where('desde', '<=', $ahora)->where('fase', '=', $fase)->first())
                                @include("front/$fase")
                            @endif
                        @endforeach
                    </div>
                    {{-- @include('front/columna-03') --}}
                </div>
            </div>
        </section>
        <footer>
            <div class="content-01">
                <div class="content-footer">
                    <a class="logo-mutarcirca" href="http://www.mutarcirca.com/" target="_blank"><img  src="img/logo-mutarcirca.png"/></a>
                    <img class="logo-footer" src="img/logo-03.png"/>
                    <p>Copyright 2014 //  <a href="#">Reglamento</a>  // <a href="#">Bases y condiciones</a>  //   <a href="#">Preguntas frecuentes</a></p>
                </div>

            </div>
        </footer>

    </body>
</html>