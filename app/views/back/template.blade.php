<html>
	<head>

	{{ HTML::script('js/jquery-1.11.0.min.js') }}
	{{ HTML::script('js/jquery.form.min.js') }}
	{{ HTML::script('js/jquery.noty.packaged.min.js') }}
	{{ HTML::script('js/underscore-min.js') }}
	{{ HTML::script('js/jquery-ui-1.10.4.min.js') }}
	{{ HTML::script('js/jquery-ui-timepicker-addon.js') }}
	{{ HTML::script('ckeditor/ckeditor.js') }}
	{{ HTML::script('ckeditor/adapters/jquery.js') }}

	{{ HTML::style('css/back.css') }}
	{{ HTML::style('css/ui-lightness/jquery-ui-1.10.4.min.css') }}

	<script>
		$(function(){
			$('body').one('click', '[content]', content_handler);

			function content_handler(e) {
				e.preventDefault();
				e.stopImmediatePropagation();

				$(this).on('click', function(e){
					e.preventDefault();
				});

				$.ajax({
					url: $(this).attr('href'),
					success: function(data) {
						if(data.status == 'ok') {
							$('#content').html(data.content);
						} else {
							noty({
								type: data.status,
								text: data.mensaje,
								timeout: 3000
							});
						}
					},
					complete: function() {
						$('[content]').one('click', content_handler);
					}
				});
			}

			$('body').one('click', '[guardar]', guardar_handler);

			function guardar_handler(e) {
				e.preventDefault();

				$(this).on('click', function(e){
					e.preventDefault();
				});

				$(this).parent().ajaxSubmit({
					beforeSubmit: function() {
						$('*').css('cursor', 'wait');
					},
					success: function(data) {
						if(data.status == 'ok') {
							if(data.mensaje) {
								noty({
									type: 'success',
									text: data.mensaje,
									timeout: 3000,
									callback: {
										afterClose: function() {
											$('#content').html(data.content);
										}
									}
								});
							} else {
								$('#content').html(data.content);
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
						$('body').one('click', '[guardar]', guardar_handler);
						$('*').css('cursor', 'auto');
					}
				});
			}

		});
	</script>
	</head>
	<body>
                <div class="logo-1">
                    <img src="{{ asset('img/logo-01.png') }}"/>
                </div>
                <div class="logo-2">
                    <img src="{{ asset('img/logo-01.png') }}"/>
                </div>
		@if(Auth::check() && Auth::user()->grupo == 1)
		<div id="menu">
			@include('back/menu')
		</div>
		@endif
		<div style="height: 10px;"></div>
		<div id="content">
		{{ $content or null }}
		</div>
	</body>
</html>