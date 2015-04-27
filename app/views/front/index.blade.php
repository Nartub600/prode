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
        <link href="css/fonts.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/prode-theme-01.css" rel="stylesheet" type="text/css" media="screen" />
        {{ HTML::script('js/jquery-1.11.0.min.js') }}
        {{ HTML::script('js/jquery.form.min.js') }}
        {{ HTML::script('js/jquery.noty.packaged.min.js') }}
        {{ HTML::script('js/underscore-min.js') }}
        <script>
        $(function(){
            $('#btn_login').one('click', btn_login_handler);

            function btn_login_handler(e) {
                e.preventDefault();

                $(this).on('click', function(e){
                    e.preventDefault();
                });

                $(this).parent('form').ajaxSubmit({
                    success: function(data) {
                        if(data.status == 'ok') {
                            location.reload();
                        } else {
                            noty({
                                type: data.status,
                                text: data.mensaje,
                                timeout: 3000
                            });
                        }
                    },
                    complete: function() {
                        $('#btn_login').one('click', btn_login_handler);
                    }
                });
            }
        });
        </script>
    </head>
    <body>
        <header>
            <div class="content-01"></div>
        </header>
        <section>
            <div class="content-01">
                <div class="login">
                    <div class="content-form-login">
                        <h1>¡Bienvenidos!</h1>
                        {{ Form::open(array(
                            'action' => 'FrontController@login',
                            'class' => 'form-login'
                        )) }}
                            <label>USUARIO</label>
                            <input class="input-01" type="text" name="nick" />
                            <label>CONTRASEÑA</label>
                            <input class="input-01" type="password" name="password" />
                            <input class="input-02" value="ENTRAR" type="submit" id="btn_login" />
                        {{ Form::close() }}
                    </div>
                    <p class="bajada">Este es el juego futbolero de Media Naranja. Participá de este prode y ganá fabulosos premios.</p>
                    <div class="logo"></div>
                </div>
            </div>
        </section>
        <footer>
            <div class="content-01"></div>
        </footer>
    </body>
</html>