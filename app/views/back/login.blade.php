<html>
	<head>
	{{ HTML::script('js/jquery-1.11.0.min.js') }}
	{{ HTML::script('js/jquery.form.min.js') }}
	{{ HTML::script('js/jquery.noty.packaged.min.js') }}

	{{ HTML::style('css/back.css') }}
	<script>
	$(function(){
		$('#btn_login').one('click', login_handler);

		function login_handler(e) {
			e.preventDefault();

			$('#btn_login').on('click', function(e){
				e.preventDefault();
			});

			$(this).parent().ajaxSubmit({
				success: function(data) {
					if(data.status == 'ok') {
						noty({
							type: 'success',
							text: 'Usuario logueado',
							timeout: 1000,
							callback: {
								afterClose: function() {
									window.location = data.url;
								}
							}
						});
					} else {
						noty({
							type: data.status,
							text: data.mensaje,
							timeout: 3000
						});
					}
				},
				complete: function() {
					$('#btn_login').one('click', login_handler);
				}
			});
		}

		$('form input').on('keypress', function(e){
			if(e.which == 13) {
				e.preventDefault();
				$('#btn_login').trigger('click');
			}
		});
	});
	</script>
	</head>
	<body>
		{{ Form::open(array(
			'action' => 'BackController@login'
		)) }}

		<p>
			<label for="nick">Usuario:</label>
			<input type="text" name="nick" />
		</p>

		<p>
			<label for="password">Contraseña:</label>
			<input type="password" name="password" />
		</p>

		<a id="btn_login" href="#">Login</a>

		{{ Form::close(); }}
	</body>
</html>