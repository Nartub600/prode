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
                                <p>NOVEDADES</p>
                                <img src="img/line.png"/>
                            </div>
                            <div class="lista">
                                @foreach(Novedad::all() as $novedad)
                                <div class="novedad">
                                    <h1>{{ $novedad->titulo }}</h1>
                                    <p>{{ substr($novedad->texto, 0, 80) . '...' }}</p>
                                    <a href="{{ url('novedad/' . $novedad->id ) }}"><p class="vermas">VER+</p></a>
                                    <img src="img/line.png"/>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNA 3 -->
                    @include('front/columna-03')
                    <!-- FIN COLUMNA 3 -->
                </div>

            </div>
        </section>
        @include('front/footer')

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