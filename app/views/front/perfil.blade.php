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
        <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:400,500,600,700' rel='stylesheet' type='text/css'>
        <link href="css/prode-theme-01.css" rel="stylesheet" type="text/css" media="screen" />

        {{ HTML::script('js/jquery-1.11.0.min.js') }}
        {{ HTML::script('js/jquery.form.min.js') }}
        {{ HTML::script('js/jquery.noty.packaged.min.js') }}
        {{ HTML::script('js/underscore-min.js') }}
        <script>
        $(function(){
            $('#btn_subir').on('click', function(e){
                e.preventDefault();

                $('#foto').trigger('click');
            });

            $('#foto').on('change', function(){
                // if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img_foto').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                // }
            });

            $('#btn_perfil').one('click', btn_perfil_handler);

            function btn_perfil_handler(e) {
                e.preventDefault();

                $('#btn_perfil').on('click', function(e){
                    e.preventDefault();
                });

                $('#frm_perfil').ajaxSubmit({
                    beforeSubmit: function() {
                        $('*').css('cursor', 'wait');
                    },
                    success: function(data) {
                        if(data.status == 'ok') {
                            if(data.mensaje) {
                                noty({
                                    type: 'success',
                                    text: data.mensaje,
                                    timeout: 1000,
                                    layout: 'topRight',
                                    callback: {
                                        afterClose: function() {
                                            window.location = data.url;
                                        }
                                    }
                                });
                            } else {
                                window.location = data.url;
                            }
                        } else {
                            if(data.validator) {
                                _.each(data.validator, function(value, key, list){
                                    // $('#' + key + '').noty({
                                    noty({
                                        text: value.join(' '),
                                        type: 'warning',
                                        timeout: 3000,
                                        layout: 'topRight',
                                        maxVisible: 10
                                    });
                                });
                            } else {
                                noty({
                                    type: data.status,
                                    text: data.mensaje,
                                    timeout: 3000
                                });
                            }
                        }
                    },
                    complete: function() {
                        $('#btn_perfil').one('click', btn_perfil_handler);
                        $('*').css('cursor', 'auto');
                    }
                });
            }

        });
        </script>
    </head>
    <body>
        <!-- HEADER -->
        @include('front/header')
        <!--  FIN HEADER -->
        <section>
            <div class="content-01">
                <div class="content-perfil">
                    <h1>¡FELICITACIONES!</h1>
                    <h2>sólo falta un paso para comenzar.</h2>
                    <img class="line-01" src="img/line.png"/>
                    <p>Editá tu perfil para habilitar el juego:</p>
                    <form class="perfil-form" id="frm_perfil" action="{{ action('UsuarioController@guardar_perfil') }}" method="post">
                        <input type="hidden" name="edicion" value="{{ empty(Auth::user()->email) ? 'no' : 'si' }}" />
                        <div class="fila">
                            <label>USUARIO</label>
                            <input name="nick" type="text" value="{{ Auth::user()->nick }}" readonly />
                        </div>
                        <div class="fila">
                            <label>MAIL</label>
                            <input name="email" type="text" value="{{ Auth::user()->email }}" {{ !empty(Auth::user()->email) ? 'readonly' : '' }} />
                        </div>
                        @if(empty(Auth::user()->email))
                        <div class="fila">
                            <label>CONFIRMAR MAIL</label>
                            <input name="email_confirmation" type="text" value="{{ Auth::user()->email }}" />
                        </div>
                        @endif
                        <div class="fila">
                            <label>TELÉFONO</label>
                            <input name="telefono" type="text" value="{{ Auth::user()->telefono }}" />
                        </div>
                        <div class="fila">
                            <label>LOCALIDAD</label>
                            <input name="localidad" type="text" value="{{ Auth::user()->localidad }}" />
                        </div>
                        <div class="fila">
                            <label>NOMBRE</label>
                            <input name="nombre" type="text" value="{{ Auth::user()->nombre }}" />
                        </div>
                        <div class="fila">
                            <label>APELLIDO</label>
                            <input name="apellido" type="text" value="{{ Auth::user()->apellido }}" />
                        </div>
                        <div class="fila">
                            <label>APODO</label>
                            <input name="apodo" type="text" value="{{ Auth::user()->apodo }}" />
                        </div>
                        <div class="fila">
                            <a class="upload-file" href="#" id="btn_subir">SUBIR FOTO</a>
                            <img class="upload-img" src="{{ Auth::user()->foto ? url('uploads/fotos/' . Auth::user()->foto) : 'img/messi.jpg' }}" id="img_foto" />
                            <div style="display: none;">
                                <input id="foto" type="file" name="foto" />
                            </div>
                        </div>
                        <div class="content-candidato">
                            <p>PRONOSTICÁ TU CANDIDATO</p>
                            <p>Si acertás al ganador sumás X puntos adicionales que te pueden ayudar a ganar el juego.</p>
                            <div class="fila" style="width: 378px;">
                                <label>TU CANDIDATO</label>
                                @if(!Auth::user()->candidato)
                                <select name="candidato">
                                    <option value="">---</option>
                                    @foreach(Equipo::where('id', '<=', 12)->get() as $equipo)
                                    <option value="{{ $equipo->id }}" {{ Auth::user()->id_candidato == $equipo->id ? 'selected' : '' }} >{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @else
                                <p>{{ Auth::user()->candidato->nombre }}</p>
                                <input type="hidden" name="candidato" value="{{ Auth::user()->candidato->id }}" />
                                @endif
                            </div>
                        </div>

                        <div class="terminos-condiciones">
                            @if(empty(Auth::user()->email))
                            <p><input class="checkbox" name="bases" type="checkbox" />Acepto términos y condiciones</p>
                            <br/>
                            <br/>
                            <p>Todos los campos son obligatorios.<br/>
                            Por favor completá tus datos y revisá que estén correctos, ya que para ganar,
                            deben ser verdaderos.</p>
                            @endif
                        </div>
                        @if(empty(Auth::user()->email))
                        <img class="line-01" src="img/line.png"/>
                        @endif
                        <input class="btn-continuar" value="Continuar" type="submit" id="btn_perfil" />
                    </form>
                </div>
            </div>
        </section>
        <!-- FOOTER -->
            @include('front/footer');
        <!-- FIN FOOTER -->
    </body>
</html>