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
        <title>Prode</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700' rel='stylesheet' type='text/css'>
        
        <link href="css/fonts.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/prode-theme-01.css" rel="stylesheet" type="text/css" media="screen" />
        

        
      
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <!-- bxSlider Javascript file -->
        <script src="js/jquery.bxslider.min.js"></script>
        <!-- bxSlider CSS file -->
        <link href="css/jquery.bxslider.css" rel="stylesheet" />
        
        
        <script type="text/javascript" src="js/libs/prettify/prettify.js"></script>
        <script type="text/javascript" src="js/jquery.slimscroll.js"></script>

    </head>
    <body>
        <header>
            <div class="content-01">
                <div class="content-menu">
                    <img class="logo-02" src="img/logo-02.png"/>
                    <ul class="menu-superior">
                        <li><a href="#">Mi perfil</a></li>
                        <li><a href="#">Mi pronóstico</a></li>
                        <li><a href="#">Tabla general</a></li>
                        <li><a href="#">Premios</a></li>
                        <li><a href="#">Novedades</a></li>
                        <li><a href="#">Extras</a></li>                  
                    </ul>
                    <a href="#" class="salir">Salir</a>
                </div>                
            </div>
        </header>
        <section>
            <div class="content-01">
                <div class="content-fixture">
                    <div class="col-1">
                        <div class="descripcion-usuario">
                            <p class="titulo">¡Hola Carrefour!</p>
                            <p class="apodo">Aquí va el “APODO”</p>
                            <img class="upload-img" src="img/messi.jpg"/>
                            
                        </div>
                        <div class="tus-puntos">
                            <p class="titulo">Tus puntos</p>
                            <div class="totales">
                                <p class="titulo">TOTALES</p>
                                <p class="puntos">20</p>
                            </div>
                            <p class="candidato">Candidato:<br/>ARGENTINA</p>
                            <div class="puntos-detalle">
                                <p>GRUPOS <span>3</span></p>
                                <p>OCTAVOS <span>60</span></p>
                                <p>CUARTOS <span>60</span></p>
                                <p>SEMI FINAL <span>-</span></p>
                                <p>FINAL <span>-</span></p>
                            </div>
                            <p class="posicion">Posición: 35/700</p>
                        </div>
                        <div class="mensajes">
                            <p class="titulo">Mensajes</p>
                            <img class="user-img" src="img/messi.jpg"/>
                            <textarea></textarea>
                            <div class="content-mensajes">
                                <div class="content-mensaje">
                                    <p class="titulo">Guisa:</p>
                                    <p class="mensaje">Este es el mensaje</p>
                                </div>
                                <div class="content-mensaje">
                                    <p class="titulo">Guisa:</p>
                                    <p class="mensaje">Este es el mensaje</p>
                                </div>
                                <div class="content-mensaje">
                                    <p class="titulo">Guisa:</p>
                                    <p class="mensaje">Este es el mensaje</p>
                                </div>
                                <div class="content-mensaje">
                                    <p class="titulo">Guisa:</p>
                                    <p class="mensaje">Este es el mensaje</p>
                                </div>
                                <div class="content-mensaje">
                                    <p class="titulo">Guisa:</p>
                                    <p class="mensaje">Este es el mensaje Este es el mensaje Este es el mensajeEste es el mensaje Este es el mensaje Este es el mensaje Este es el mensaje</p>
                                </div>
                                <div class="content-mensaje">
                                    <p class="titulo">Guisa:</p>
                                    <p class="mensaje">Este es el mensaje Este es el mensaje Este es el mensajeEste es el mensaje Este es el mensaje Este es el mensaje Este es el mensaje</p>
                                </div>
                                <div class="content-mensaje">
                                    <p class="titulo">Guisa:</p>
                                    <p class="mensaje">Este es el mensaje Este es el mensaje Este es el mensajeEste es el mensaje Este es el mensaje Este es el mensaje Este es el mensaje</p>
                                </div>
                                <div class="content-mensaje">
                                    <p class="titulo">Guisa:</p>
                                    <p class="mensaje">Este es el mensaje Este es el mensaje Este es el mensajeEste es el mensaje Este es el mensaje Este es el mensaje Este es el mensaje</p>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-2">
                        <?php
                            include 'grupos.php';
                            include 'octavos.php';
                            include 'cuartos.php';
                            include 'semifinales.php';
                            include 'tercercuartopuesto.php';
                            include 'final.php';
                        ?>
                    </div>
                    <div class="col-3">col 3</div>
                </div>
                <div style="height: 46px; width: 100%; position: relative; float: left;"></div>
            </div>
        </section>
        <footer>
            <div class="content-01"></div>
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
            width: '480px',
            height:'700px',
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