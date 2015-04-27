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
        {{ HTML::style('css/reset.css') }}
        <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700' rel='stylesheet' type='text/css'>
        {{ HTML::style('css/fonts.css') }}
        {{ HTML::style('css/prode-theme-01.css') }}
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <!-- bxSlider Javascript file -->
        {{ HTML::script('js/jquery.bxslider.min.js') }}

        <!-- bxSlider CSS file -->
        {{ HTML::style('css/jquery.bxslider.css') }}

        {{ HTML::script('js/prettify/prettify.js') }}
        {{ HTML::script('js/jquery.slimscroll.js') }}

        {{ HTML::script('js/jquery.form.min.js') }}
        {{ HTML::script('js/underscore-min.js') }}
        {{ HTML::script('js/jquery.noty.packaged.min.js') }}
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
                        <div class="content-novedades">
                            <div class="titulo">
                                <p>{{ $novedad->titulo }}</p>
                                <img src="{{ asset('img/line.png') }}"/>
                            </div>
                            <div class="novedad-desarrollo">
                                <p>{{ $novedad->texto }}</p>
                            </div>
                        </div>
                    </div>
                    @include('front/columna-03')
                </div>
            </div>
        </section>
        <footer>
            <div class="content-01">
                <div class="content-footer">
                    <a class="logo-mutarcirca" href="http://www.mutarcirca.com/" target="_blank"><img  src="{{ asset('img/logo-mutarcirca.png') }}"/></a>
                    <img class="logo-footer" src="{{ asset('img/logo-03.png') }}"/>
                    <p>Copyright 2014 //  <a href="#">Reglamento</a>  // <a href="#">Bases y condiciones</a>  //   <a href="#">Preguntas frecuentes</a></p>
                </div>

            </div>
        </footer>

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
        $('.col-2').slimScroll({
            width: '490px',
            height:'902px',
            alwaysVisible: true,
            railVisible: true
        });
        $('.content-mensajes').slimScroll({
            width: '275px',
            height:'290px',
            start: $('.content-mensajes'),
            alwaysVisible: true,
            railVisible: true
        });
        $('.slimScrollDiv').css('float', 'left');
        $('.mensajes .slimScrollDiv').css('top', '90px');
        $('.mensajes .slimScrollDiv').css('left', '10px');
    });
</script>