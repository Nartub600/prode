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
        
        <script>
            $(document).ready(function() {
                
                $('.bxslider-fotogaleria').bxSlider({
                    preloadImages: 'all',
                    infiniteLoop: true,
            onSliderLoad: function() {
                
            },
            onSlideAfter: function(slide) {
               
            }
        });
            });
        </script>
    </head>
    <body>
        @include('front/header')
        <section>
            <style>
                .bx-wrapper .bx-next {
                    right: 7px;
                }
                .bx-wrapper .bx-prev {
                    left: 8px;
                }
                .bx-wrapper .bx-controls-direction a {
                    position: absolute;
                    top: 268px;
                    margin-top: -16px;
                    outline: 0;
                    width: 32px;
                    height: 32px;
                    text-indent: -9999px;
                    z-index: 9999;
                }

            </style>
            <div class="content-01">
                <div class="content-fixture">
                    <div class="col-1">
                        @include('front/columna-01')
                    </div>
                    <div class="col-2">
                        <div class="content-extras">
                            <div class="fotoGaleria">
                                <h1>FOTO GALERÍA</h1>
                               <div class="slider-fotos">
                                    <ul class="bxslider-fotogaleria">
                                        <li><img src="img/extras/02.jpg"/></li>
                                        <li><img src="img/extras/03.jpg"/></li>
                                        <li><img src="img/extras/04.jpg"/></li>
                                        <li><img src="img/extras/05.jpg"/></li>
                                        <li><img src="img/extras/06.jpg"/></li>
                                        <li><img src="img/extras/07.jpg"/></li>
                                        <li><img src="img/extras/08.jpg"/></li>
                                        <li><img src="img/extras/09.jpg"/></li>
                                        <li><img src="img/extras/10.jpg"/></li>
                                        <li><img src="img/extras/11.jpg"/></li>
                                        <li><img src="img/extras/12.jpg"/></li>
                                        <li><img src="img/extras/13.jpg"/></li>
                                        <li><img src="img/extras/14.jpg"/></li>
                                        <li><img src="img/extras/15.jpg"/></li>
                                        <li><img src="img/extras/16.jpg"/></li>
                                        <li><img src="img/extras/17.jpg"/></li>
                                        <li><img src="img/extras/18.jpg"/></li>
                                        <li><img src="img/extras/19.jpg"/></li>
                                        <li><img src="img/extras/20.jpg"/></li>
                                        <li><img src="img/extras/21.jpg"/></li>
                                        <li><img src="img/extras/22.jpg"/></li>
                                        <li><img src="img/extras/23.jpg"/></li>
                                        <li><img src="img/extras/24.jpg"/></li>
                                        <li><img src="img/extras/25.jpg"/></li>
                                        <li><img src="img/extras/26.jpg"/></li>
                                        <li><img src="img/extras/27.jpg"/></li>
                                        <li><img src="img/extras/28.jpg"/></li>
                                        <li><img src="img/extras/29.jpg"/></li>
                                        <li><img src="img/extras/30.jpg"/></li>
                                        <li><img src="img/extras/31.jpg"/></li>
                                        <li><img src="img/extras/32.jpg"/></li>
                                        <li><img src="img/extras/33.jpg"/></li>
                                        <li><img src="img/extras/34.jpg"/></li>
                                        <li><img src="img/extras/35.jpg"/></li>
                                        <li><img src="img/extras/36.jpg"/></li>
                                        <li><img src="img/extras/37.jpg"/></li>
                                        <li><img src="img/extras/38.jpg"/></li>
                                        <li><img src="img/extras/39.jpg"/></li>
                                        <li><img src="img/extras/40.jpg"/></li>
                                        <li><img src="img/extras/41.jpg"/></li>
                                        <li><img src="img/extras/42.jpg"/></li>
                                        <li><img src="img/extras/43.jpg"/></li>
                                        <li><img src="img/extras/44.jpg"/></li>
                                        <li><img src="img/extras/45.jpg"/></li>
                                        <li><img src="img/extras/46.jpg"/></li>
                                        <li><img src="img/extras/47.jpg"/></li>
                                        <li><img src="img/extras/48.jpg"/></li>
                                        <li><img src="img/extras/49.jpg"/></li>
                                        <li><img src="img/extras/50.jpg"/></li>
                                        <li><img src="img/extras/51.jpg"/></li>
                                        <li><img src="img/extras/52.jpg"/></li>
                                        <li><img src="img/extras/53.jpg"/></li>
                                        <li><img src="img/extras/54.jpg"/></li>
                                    </ul>
                               </div>
                            </div>
                            <div class="content-extras-info">
                                <div class="titulo-info">
                                    <h1>SELECCIONES</h1>
                                </div>
                                <img src="img/equipos.png"/>
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